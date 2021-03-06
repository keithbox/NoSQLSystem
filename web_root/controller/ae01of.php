<?php

function GetTableStructure(){
	$courseManager = new OfferManager();
    return $courseManager->selectPrimaryKeyList();
}

function CreateData($requestData){
	$courseManager = new OfferManager();
    $responseArray = array();
	$responseArray = $courseManager->CreateResponseArray();
    
	$createRows = new stdClass();
	$createRows = $requestData->Data->Header;
	foreach ($createRows as $keyIndex => $rowItem) {
		// $courseManager->Initialize();

		foreach ($rowItem as $columnName => $value) {
			$courseManager->$columnName = $value;
		}

		$responseArray = $courseManager->Insert();
	}
	return $responseArray;
}

function FindData($requestData){
	$courseManager = new OfferManager();

	$updateRows = new stdClass();
	$updateRows = $requestData->Data->Header;
    
	foreach ($updateRows as $keyIndex => $rowItem) {
        foreach ($rowItem as $columnName => $value) {
            $courseManager->$columnName = $value;
        }
        $responseArray = $courseManager->Select();
        break;
    }
    
	return $responseArray;
}

function GetData($requestData){
	$courseManager = new OfferManager();
    
	$offsetRecords = 0;
	$offsetRecords = $requestData->Offset;
	$pageNum = $requestData->PageNum;

	$responseArray = $courseManager->selectPage($offsetRecords);
    
	return $responseArray;

}

function UpdateData($requestData){
	$courseManager = new OfferManager();

	$updateRows = new stdClass();
	$updateRows = $requestData->Data->Header;
	foreach ($updateRows as $keyIndex => $rowItem) {
		foreach ($rowItem as $columnName => $value) {
			$courseManager->$columnName = $value;
		}
        
		$responseArray = $courseManager->Update();

	}
	return $responseArray;
}

function DeleteData($requestData){
	$courseManager = new OfferManager();

	$deleteRows = new stdClass();
	$deleteRows = $requestData->Data->Header;
	foreach ($deleteRows as $keyIndex => $rowItem) {
		foreach ($rowItem as $columnName => $value) {
			$courseManager->$columnName = $value;
		}
		$responseArray = $courseManager->Delete();

	}
	return $responseArray;
}


?>