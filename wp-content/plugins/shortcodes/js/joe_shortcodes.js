function staticVideo(vid){
	window.location.assign("?vid="+vid);
}

function anthem_assessment_link(){
	var campusID = jQuery("#CampusID").val();
	//alert(campusID);
	switch ( campusID ) {
		case "BC":
			var link = 4;
			break;
		case "BRY":
			var link = 8;
			break;
		case "MEM":
			var link = 1;
			break;
		case "NAS":
			var link = 1;
			break;
		case "AOL":
			var link = 2;
			break;
		case "ATL":
			var link = 2;
			break;
		case "BEA":
			var link = 2;
			break;
		case "HOU":
			var link = 2;
			break;
		case "IRV":
			var link = 2;
			break;
		case "BRF":
			var link = 2;
			break;
		case "ORW":
			var link = 2;
			break;
		case "PHX":
			var link = 2;
			break;
		case "SAC":
			var link = 2;
			break;
		case "MLH":
			var link = 2;
			break;
		case "FEN":
			var link = 2;
			break;
		case "CRH":
			var link = 3;
			break;
		case "JER":
			var link = 3;
			break;
		case "LAS":
			var link = 3;
			break;
		case "NRB":
			var link = 3;
			break;
		case "PAR":
			var link = 3;
			break;
		case "SPR":
			var link = 3;
			break;
		case "BB":
			var link = 5;
			break;
		case "CLW":
			var link = 5;
			break;
		case "ORW":
			var link = 5;
			break;
		case "HI":
			var link = 5;
			break;
		case "JAX":
			var link = 5;
			break;
		case "KEN":
			var link = 5;
			break;
		case "LL":
			var link = 5;
			break;
		case "MGT":
			var link = 5;
			break;
		case "MIA":
			var link = 5;
			break;
		case "PP":
			var link = 5;
			break;
		case "RIV":
			var link = 5;
			break;
		case "WPB":
			var link = 6;
			break;
		case "MOR":
			var link = 7;
			break;
		case "":
			var link = 0;
			break;
		default:
			var link = 2;
	}

	var href = getHref(link);

	jQuery("#anthem_assessment_link").attr("href", href);
}

function getHref(link){
	switch (link){
		case 1:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-045.00';//Anthem - Anthem Career College
			break;
		case 2:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-041.00';//Anthem - Anthem College
			break;
		case 3:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-043.00';//Anthem - Anthem Institute
			break;
		case 4:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-042.00';//Anthem - Bryman School
			break;
		case 5:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-040.00';//Anthem - Florida Career College
			break;
		case 6:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-046.00';//Anthem - Florida North
			break;
		case 7:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-044.00';//Anthem - Morrison University
			break;
		case 8:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-047.00';//Anthem - The Bryman School of Arizona
			break;
		case 0:
			var href = '#';//Same Page
			break;
		default:
			var href = 'http://login.careermotivations.com/TakeTheAssessment/LoginOrRegister.aspx?racc=20-0000-040.00';//Anthem - Florida Career College
	}

	return href;
}