$(document).ready(function() {
    var hash = "";

    function hashFile(e) {
        e.preventDefault();
        var blobSlice = File.prototype.slice || File.prototype.mozSlice || File.prototype.webkitSlice,
            file = document.getElementById('fileToHash').files[0],
            chunkSize = 2097152,                             // Read in chunks of 2MB
            chunks = Math.ceil(file.size / chunkSize),
            currentChunk = 0,
            spark = new SparkMD5.ArrayBuffer(),
            fileReader = new FileReader();

        fileReader.onload = function (e) {
            console.log('read chunk nr', currentChunk + 1, 'of', chunks);
            spark.append(e.target.result);                   // Append array buffer
            currentChunk++;

            if (currentChunk < chunks) {
                loadNext();
            } else {
                console.log('finished loading');
                hash = spark.end();
                // console.info('computed hash', spark.end());  // Compute hash
            }
        };

        fileReader.onerror = function () {
            console.warn('oops, something went wrong.');
        };

        function loadNext() {
            var start = currentChunk * chunkSize,
                end = ((start + chunkSize) >= file.size) ? file.size : start + chunkSize;

            fileReader.readAsArrayBuffer(blobSlice.call(file, start, end));
        }

        loadNext();
    }

    $('#hashForm').on('submit', function(e){
        hashFile(e);
        document.getElementById('hashResult').innerHTML = hash;
    });

    $('#scanForm').on('submit', function(e){
        hashFile(e);
        var element = document.getElementById("myprogressBar");   
        var width = 1;
        var identity = setInterval(scene, 30);
        function scene() {
            if (width >= 100) {
                clearInterval(identity);
            } else {
                width++; 
                element.style.width = width + '%'; 
            }
        }
        setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "scan/scanAPI.php",
                data: {hash: hash},
                success: function(data){
                    data = jQuery.parseJSON(data);
                    console.log(data);
                    document.getElementById('scanResult').innerHTML = data.message;
                    document.getElementById('status-img').setAttribute('src', 'images/' + data.status + '.jpg');
                    document.getElementById('status-img').setAttribute('alt', data.status);
                    document.getElementById('status-img').setAttribute('style' , 'height: 200px; width: 200px;');
                }
            });
        }, 5000);
    });
});
