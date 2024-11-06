<?php
// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    die;
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES["file"]["tmp_name"];
        $maxDuration = 30; // Maximum duration allowed in seconds

        // Get the duration of the uploaded video
        $videoDuration = getVideoDuration($uploadedFile);

        if ($videoDuration !== false && $videoDuration <= $maxDuration) {
            move_uploaded_file($uploadedFile, "uploads/" . $_FILES["file"]["name"]);
            echo "File uploaded successfully.";
        } else {
            echo "Error: Video exceeds the maximum duration of 30 seconds.";
        }
    } else {
        echo "Error uploading file.";
    }
}
// Set maximum execution time to 30 seconds
set_time_limit(3000);


// Function to get the duration of a video file
function getVideoDuration($file)
{
    $ffmpegPath = '/usr/bin/ffmpeg'; // Path to ffmpeg executable
    $command = "$ffmpegPath -i $file 2>&1";
    exec($command, $output);

    foreach ($output as $line) {
        if (strpos($line, 'Duration:') !== false) {
            preg_match('/Duration: (.*?),/', $line, $matches);
            $duration = explode(':', $matches[1]);
            $seconds = ($duration[0] * 3600) + ($duration[1] * 60) + round($duration[2]);
            return $seconds;
        }
    }
    return false;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="">
        <input type="file" name="file" value="">
        <input type="submit" value="Upload">
    </form>
</body>
</html>