<?php

class Model
{
    protected $placeHolderProp = array();
    protected $fullNameProp;
    protected $subjectProp;
    protected $emailProp;
    protected $msgProp;

    public function __construct()
    {
        $this->placeHolderProp['%TITLE%'] = 'Contact Form';
        $this->placeHolderProp['%THEM_0%'] = 'Subject 0';
        $this->placeHolderProp['%THEM_1%'] = 'Subject 1';
        $this->placeHolderProp['%THEM_2%'] = 'Subject 2';
        $this->placeHolderProp['%THEM_3%'] = 'Subject 3';
        $this->placeHolderProp['%SELECT_0%'] = 'selected="selected"';
        $this->placeHolderProp['%SELECT_1%'] = '';
        $this->placeHolderProp['%SELECT_2%'] = '';
        $this->placeHolderProp['%SELECT_3%'] = '';
        $this->placeHolderProp['%ERR_SUBJECT%'] = '';
        $this->placeHolderProp['%FULLNAME%'] = '';
        $this->placeHolderProp['%ERR_NAME%'] = '';
        $this->placeHolderProp['%EMAIL%'] = '';
        $this->placeHolderProp['%ERR_EMAIL%'] = '';
        $this->placeHolderProp['%MSG%'] = '';
        $this->placeHolderProp['%ERR_MSG%'] = '';
        $this->placeHolderProp['%SUCCES%'] = '';
        $this->placeHolderProp['%ERR_SEND%'] = '';
    }

    public function getArray()
    {
        return $this->placeHolderProp;
    }

    public function checkForm()
    {
        $this->placeHolderProp['%ERRORS%'] = '';
        foreach ($_POST as $k => $v) {
            $_POST[$k] = trim(strip_tags($v));
        }
        $this->checkFullName();
        $this->checkSubject();
        $this->checkEmail();
        $this->checkMsg();

        if (($this->checkFullName()) && ($this->checkSubject()) && ($this->checkEmail()) && ($this->checkMsg())) {
            return true;
        } else {
            return false;
        }
    }

    public function checkFullName()
    {
        if (!preg_match('/[0-9]/', $_POST['fullName'])) {
            if (strlen($_POST['fullName']) > 5) {
                $this->placeHolderProp['%FULLNAME%'] = $_POST['fullName'];
                $this->fullNameProp = $this->placeHolderProp['%FULLNAME%'];
                return true;
            } else {
                $this->placeHolderProp['%ERR_NAME%'] = "<div class=\"alert alert-danger\" role=\"alert\">In the \"Name\" field must be more than five letters</div>";
                $this->placeHolderProp['%FULLNAME%'] = '';
                return false;
            }
        } else {
            $this->placeHolderProp['%ERR_NAME%'] = "<div class=\"alert alert-danger\" role=\"alert\">In the \"Name\" field must be only letters</div>";
            $this->placeHolderProp['%FULLNAME%'] = '';
            return false;
        }
    }

    public function checkSubject()
    {
        if ($_POST['subject'] != 0) {
            $str = '%SELECT_' . $_POST['subject'] . '%';
            $this->placeHolderProp[$str] = 'selected="selected"';
            $this->placeHolderProp['%SELECT_0%'] = '';
            switch ($_POST['subject']) {
                case 1:
                    $this->subjectProp = 'Subject 1';
                    break;
                case 2:
                    $this->subjectProp = 'Subject 2';
                    break;
                case 3:
                    $this->subjectProp = 'Subject 3';
                    break;
            }
            return true;
        } else {
            $this->placeHolderProp['%ERR_SUBJECT%'] = "<div class=\"alert alert-danger\" role=\"alert\">Default subject cant be selected. Please, select other subject.</div>";
            return false;
        }
    }

    public function checkEmail()
    {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->placeHolderProp['%EMAIL%'] = $_POST['email'];
            $this->emailProp = $this->placeHolderProp['%EMAIL%'];
            return true;
        } else {
            $this->placeHolderProp['%EMAIL%'] = '';
            $this->placeHolderProp['%ERR_EMAIL%'] = "<div class=\"alert alert-danger\" role=\"alert\">Wrong email input!</div>";
            return false;
        }
    }

    public function checkMsg()
    {
        if (strlen($_POST['msg']) > 10) {
            $this->placeHolderProp['%MSG%'] = $_POST['msg'];
            $this->msgProp = $this->placeHolderProp['%MSG%'];
            return true;
        } else {
            $this->placeHolderProp['%MSG%'] = '';
            $this->placeHolderProp['%ERR_MSG%'] = "<div class=\"alert alert-danger\" role=\"alert\">In the \"Message\" field must be more than ten characters</div>";
            return false;
        }
    }

    public function sendEmail()
    {
        date_default_timezone_set('Europe/Kiev');
        $msg = 'From: ' . $this->fullNameProp . "\r\n";
        $msg .= 'Subject: ' . $this->subjectProp . "\r\n";
        $msg .= 'Message: ' . $this->msgProp . "\r\n";
        $msg .= 'Email: ' . $this->emailProp . "\r\n";
        $msg .= "\r\n" . 'IP-adress: ' . $_SERVER['REMOTE_ADDR'] . "\r\n";
        $msg .= 'Date and time: ' . date("Y-m-d H:i:s");

        $header = 'From: ' . $this->emailProp . "\r\n" . 'Content-type: text/html; charset=utf-8' . "\r\n"
            . 'Reply-To: ' . $this->emailProp . "\r\n";

        dd($msg);
        $send = mail(EMAIL_TO, $this->subjectProp, $msg, $header);
        if ($send) {
            $this->placeHolderProp['%FULLNAME%'] = '';
            $this->placeHolderProp['%SELECT_' . $_POST['subject'] . '%'] = '';
            $this->placeHolderProp['%SELECT_0%'] = 'selected="selected"';
            $this->placeHolderProp['%EMAIL%'] = '';
            $this->placeHolderProp['%MSG%'] = '';
//            $this->placeHolderProp['%SUCCESS%'] = 'Mail successfully sent!';
            $this->placeHolderProp['%SUCCESS%'] = "<div class=\"alert alert-success\" role=\"alert\">
  Mail successfully sent!
</div>";
            return true;
        } else {
            $this->placeHolderProp['%ERR_SEND%'] = 'Error to send email';
            return false;
        }
    }
}
