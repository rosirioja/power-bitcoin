<?php

class ModalController extends \BaseController {
	protected $layout = "landing.default";

	public function getIndex()
	{
		$campaignid = Request::segment(3);
		$datefrom = Request::segment(4);
		$dateto = Request::segment(5);
		$bankchosen = Request::segment(6);


		$donate = new Donations;

		if ($bankchosen == "All"){
				$report = $donate->getAllReports($campaignid, $dateto, $datefrom);
		}else{
			
					$report = $donate->getReports($campaignid, $dateto, $datefrom, $bankchosen);
		}
		
	}

	public function getWhat(){
	$campaignid = Request::segment(3);
		$usersid= Request::segment(4);

		$campaign = new Campaign;
		$detail = $campaign->getCampaignDetails($usersid, $campaignid);

		$donate = new Donations;
		$report = $donate->getReports($campaignid);
		//dd($report);
		$data=array("campaignid"=>$campaignid, "usersid"=>$usersid, "detail"=>$detail, "report"=>$report);
		//dd($data);
		return View::make("landing.modal")->with($data);
		
	}

}