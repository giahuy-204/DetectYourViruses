<?php
    //get data from the request
    $request_body = file_get_contents('php://input');
    //convert hash from request body to hash only
    $hash = substr($request_body, 5);

    $post = array('apikey' => 'c382bfef5d155837eafb6739943f6577d10f1ebf6d224755bc389f58ddbce746','resource'=>"$hash");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/file/report');
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1); // remove this if your not debugging
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
    curl_setopt($ch, CURLOPT_USERAGENT, "gzip, My php curl client");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER ,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $result=curl_exec ($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($status_code == 200) 
    { // OK
        //$js = json_decode($result, true);
        $array_file = array_values(json_decode($result, true));
        
        if($array_file[0] != 0){
            $loop = array_values($array_file[0]);

            $count = 0;
            $i = 0;

            while ($i< count($array_file[0])){
                if($loop[$i]["detected"] == 1){
                    $count = $count + 1;
                }
                $i = $i + 1;
            }

            if($count == 0){

                echo json_encode(array(
                    "status" => "safe", 
                    "message" => "File is safe.",
                    "data" => $hash
                ));

            }else{
                echo json_encode(array(
                    "status" => "danger", 
                    "message" => "File is danger.",
                    "data" => $hash
                ));
            }
            
        }else{
            echo json_encode(array(
                "status" => "safe", 
                "message" => "File is safe.",
                "data" => $hash
            ));
        }

    } else {  // Error occured
        echo json_encode(array(
            "status" => "failed", 
            "message" => "Failed to scan file.",
            "data" => $hash
        ));
    }
    curl_close ($ch);
?>