<?php
    include_once "Include/header.php";
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                     
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">Detect Your Viruses</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                 <a class="nav-link" href="#">Index <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="hashFile.php">Hash File</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="scanFile.php">Scan file</a>
                           </li>
                        </ul>
                    </div>
                </nav>
                <div class="jumbotron text-center">
                    <h2>
                        Detect your viruses!
                    </h2>
                    <p>
                        Website design specifically for detecting viruses in files.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mx-auto text-center">
            <div class="col-md-6">
                <h2>
                    Hashing File
                </h2>
                <p>
                    Upload a file to hash it. The file will be hashed using the MD5 algorithm.
                </p>
                <p>
                    <a class="btn" href="hashFile.php">View details »</a>
                </p>
            </div>
            <div class="col-md-6">
                <h2>
                    Scan File
                </h2>
                <p>
                    Upload a file to scan for viruses. The file will be hashed and compared to a list of known virus hashes.
                </p>
                <p>
                    <a class="btn" href="scanFile.php">View details »</a>
                </p>
            </div>
        </div>
    </div>

<?php 
    include_once "Include/footer.php";
?>