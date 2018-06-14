<CTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body>
    <div class="container-fluid">
<!--        <div class="row">-->
<!--            <div class="col text-center">-->
<!--                <h1>-->
<!--                    <span class="badge badge-secondary">Task 6</span>-->
<!--                </h1>-->
<!--            </div>-->
<!--        </div>-->
        <div class="row">
            <div class="col">
<!--                --><?php
//                if (false !== $message)
//                {
//                    echo '<div class="alert alert-danger">'
//                        .'<strong>Error!</strong> '
//                        .$message
//                        .'</div>';
//                }
//                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                if (false !== $results)
                {
                    foreach ($results as $band)
                    {
                        echo '<div class="row"><div class="col text-center"><h1><span class="badge badge-primary">'.$band->getName().'</span></h1></div></div>'."\n";
                        echo '<div class="row"><div class="col text-center"><strong>'.$band->getGenre().'</strong></div></div>'."\n";

                        foreach ($band->getMusician() as $musi)
                        {
                            echo '<div class="row">'."\n";
                            echo '<div class="col-3 text-center">'.$musi->getName()
                                .'<br />'
                                .'<small>'.$musi->getMusicianType().'</small>'
                                .'</div>'."\n";
                            echo '<div class="col-9">';

                            foreach ($musi->getInstrument() as $instrum)
                            {
                                echo $instrum->getName().'<br />'
                                    .'<small>'.$instrum->getCategory().'</small><br />';
                            }
                            echo '</div>'."\n";
                            echo '</div><hr />';
                        }

                    }
                }
                ?>
            </div>
        </div>
    </div>
    </body>
    </html>
