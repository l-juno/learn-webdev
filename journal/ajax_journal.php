<?php
    $name = $_POST["nameButton"];
    $date = $_POST["dateButton"];
    $scaleVal = $_POST["scaleButton"];
    $journal = $_POST["journalButton"];

    $summary = [];
    $summary["name"] = $name; //{name: "justin"}
    $summary["date"] = $date; //{date: "2004-01-24"}
    $summary["scale"] = $scaleVal; //{scale = "4"}
    $summary["journal"] = $journal; //{journal: "because...."}

    echo json_encode($summary);

?>