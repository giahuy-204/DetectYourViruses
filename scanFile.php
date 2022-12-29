<?php
    include_once "include/header.php";
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
                            <li class="nav-item">
                                 <a class="nav-link" href="#">Index</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="hashFile.php">Hash File <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="scanFile.php">Scan file</a>
                           </li>
                        </ul>
                    </div>
                </nav>
                <div class="jumbotron">
                    <h2>
                        Scan File
                    </h2>
                    <p>
                        Upload your file here and we will scan it for you.
                    </p>
                    <form id="scanForm">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="fileToHash">
                        </div>
                        <button type="submit" class="btn btn-primary" id="hashButton">Scan File</button>
                    </form>
                    <div id="Progress_Status">
                        <div id="myprogressBar"></div>
                    </div>
                    Result: <p id="scanResult" class="font-italic"></p>
                    <br>
                    <img src="" alt="" id="status-img">
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyClipboard() {
            var copyText = document.getElementById("hashResult").innerHTML;

            navigator.clipboard.writeText(copyText);
            
            alert("Copied the text: " + copyText);
        }
    </script>
<?php
    include_once "include/footer.php";
?>