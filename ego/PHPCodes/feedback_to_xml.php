<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $child = $_POST['child'] ?? '';
    $teacher = $_POST['teacher'] ?? '';
    $acadprogress = $_POST['acadprogress'] ?? '';
    $classroomexp = $_POST['classroomexp'] ?? '';

    $xmlFilePath = "../XML/feedbacks.xml";

    if (file_exists($xmlFilePath) && filesize($xmlFilePath) > 0) {
        $xml = simplexml_load_file($xmlFilePath);
        if ($xml === false) {
            die('Error loading XML file');
        }
    } else {
        $xml = new SimpleXMLElement('<feedbacks></feedbacks>');
    }

    $feedback = $xml->addChild('feedback');
    $feedback->addChild('child', $child);
    $feedback->addChild('teacher', $teacher);
    $feedback->addChild('acadprogress', $acadprogress);
    $feedback->addChild('classroomexp', $classroomexp);

    $result = $xml->asXML($xmlFilePath);
    if ($result === false) {
        die('Error saving XML file');
    }

    header("Location: ../Parent/send_feedback_to_teacher.php");
    exit();
}
?>
