<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>%TITLE%</title>
</head>
<body>

<div class="container">
    <img class="img-fluid mb-5 d-block mx-auto" src="src/profile.png" alt="">
    <div class="row">
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="" method="post">
			
				<div class="form-group">
					<div>%SUCCESS%</div>
				</div>
				
                <div class="form-group">
                    <label for="inputFullName">Full name</label>
                    <input type="text" class="form-control" id="inputFullName" name="fullName"
                           placeholder="Enter Full name"
                           value="%FULLNAME%">
                    <small id="inputFullName" class="form-text text-muted">The minimum number of letters is five</small>
                    <div>%ERR_NAME%</div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Subject</label>
                    <select class="form-control input" name="subject">
                        <option %SELECT_0% value="0">%THEM_0%</option>
                        <option %SELECT_1% value="1">%THEM_1%</option>
                        <option %SELECT_2% value="2">%THEM_2%</option>
                        <option %SELECT_3% value="3">%THEM_3%</option>
                    </select>
					<small id="inputFullName" class="form-text text-muted">Select subject</small>
                    <div>%ERR_SUBJECT%</div>
                </div>

                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" value="%EMAIL%" name="email"
                           placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                    <div>%ERR_EMAIL%</div>
                </div>

                <div class="form-group">
                    <label for="inputMessage">Message</label>
                    <textarea class="form-control" name="msg" placeholder="Message">%MSG%</textarea>
					<small id="inputFullName" class="form-text text-muted">The text of the message must be at least ten characters</small>
                    <div>%ERR_MSG%</div>
                </div>

                <button type="submit" class="btn btn-outline-success btn-block">Submit</button>
				
            </form>
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</html>
