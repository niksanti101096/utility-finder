
var SPL_URL = location.origin;

// holds an instance of XMLHttpRequest
var SPLxmlHttp = SPLcreateXmlHttpRequestObject();

// creates an XMLHttpRequest instance
function SPLcreateXmlHttpRequestObject() 
{
  // will store the reference to the XMLHttpRequest object
  var xmlHttp;
  // this should work for all browsers except IE6 and older
  try
  {
    // try to create XMLHttpRequest object
    xmlHttp = new XMLHttpRequest();
  }
  catch(e)
  {
    // assume IE6 or older
    var XmlHttpVersions = new Array('MSXML2.XMLHTTP.6.0',
                                    'MSXML2.XMLHTTP.5.0',
                                    'MSXML2.XMLHTTP.4.0',
                                    'MSXML2.XMLHTTP.3.0',
                                    'MSXML2.XMLHTTP',
                                    'Microsoft.XMLHTTP');
    // try every prog id until one works
    for (var i=0; i<XmlHttpVersions.length && !xmlHttp; i++) 
    {
      try 
 
      { 
        // try to create XMLHttpRequest object
        xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
      } 
      catch (e) {}
    }
  }
  // return the created object or display an error message
  if (!xmlHttp)
    alert("Error creating the XMLHttpRequest object.");
  else 
    return xmlHttp;
}


// function called when the state of the HTTP request changes
function SPLhandleRequestStateChange() 
{
  try
  {
	  // when readyState is 4, we are ready to read the server response
	  if (SPLxmlHttp.readyState == 4) 
	  {
	    // continue only if HTTP status is "OK"
	    if (SPLxmlHttp.status == 200) 
	    {
	      try
	      {
		// do something with the response from the server
		SPLhandleServerResponse();
	      }
	      catch(e)
	      {
		// display error message
		//alert("Error reading the response: " + e.toString());
	      }
	    } 
	    else
	    {
	      // display status message
	      alert("There was a problem retrieving the data:\n" + 
		    SPLxmlHttp.statusText);
	    }
	  }
   }
   catch(e)
   {
   // ignore
   }
}
 
// #################### Get Address to Combo ############################ 
var whichField = 1;
var divContainer = '';
// read a file from the server
function SPLGetAddressData(postcode)
{
// loading
 $('#SPLSearchArea').html('<i>Loading...</i>');
 whichField = 1;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
    // try to connect to the server
    try
    {
      // initiate reading a file from the server
      SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
      SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
      SPLxmlHttp.send(null);
    }
    // display the error in case of failure
    catch (e)
    {
      //alert("Can't connect to server:\n" + e.toString());
      //Suppress error, since can be cause by two calls at once
    }
  }
}

function SPLGetAddressDataWillInstruction(postcode, divContainerGet)
{
 // loading
 $('#'+divContainerGet).html('<i>Loading...</i>');
 whichField = 9;
 divContainer = divContainerGet;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
    // try to connect to the server
    try
    {
      // initiate reading a file from the server
      SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
      SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
      SPLxmlHttp.send(null);
    }
    // display the error in case of failure
    catch (e)
    {
      //alert("Can't connect to server:\n" + e.toString());
      //Suppress error, since can be cause by two calls at once
    }
  }
}

function SPLGetAddressData_site(postcode)
{
 whichField = 3;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
    // try to connect to the server
    try
    {
      // initiate reading a file from the server
      SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
      SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
      SPLxmlHttp.send(null);
    }
    // display the error in case of failure
    catch (e)
    {
      //alert("Can't connect to server:\n" + e.toString());
      //Suppress error, since can be cause by two calls at once
    }
  }
}

function SPLGetAddressData_reservation(postcode)
{

}

function SPLGetAddressData2(postcode)
{
 whichField = 2;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
    // try to connect to the server
    try
    {
      // initiate reading a file from the server
      SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
      SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
      SPLxmlHttp.send(null);
    }
    // display the error in case of failure
    catch (e)
    {
      //alert("Can't connect to server:\n" + e.toString());
      //Suppress error, since can be cause by two calls at once
    }
  }
}

function SPLGetAddressData_declaration(postcode)
{
 whichField = 4;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
    // try to connect to the server
    try
    {
      // initiate reading a file from the server
      SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
      SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
      SPLxmlHttp.send(null);
    }
    // display the error in case of failure
    catch (e)
    {
      //alert("Can't connect to server:\n" + e.toString());
      //Suppress error, since can be cause by two calls at once
    }
  }
}

function SPLGetAddressData_reservation(postcode)
{
 whichField = 5;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
    // try to connect to the server
    try
    {
      // initiate reading a file from the server
      SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
      SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
      SPLxmlHttp.send(null);
    }
    // display the error in case of failure
    catch (e)
    {
      //alert("Can't connect to server:\n" + e.toString());
      //Suppress error, since can be cause by two calls at once
    }
  }
}

function SPLGetAddressData_owner_dashboard(postcode)
{
	whichField = 6;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
		// try to connect to the server
		try
		{
		// initiate reading a file from the server
		SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
		SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
		SPLxmlHttp.send(null);
		}
		// display the error in case of failure
		catch (e)
		{
		//alert("Can't connect to server:\n" + e.toString());
		//Suppress error, since can be cause by two calls at once
		}
	}
}

function SPLGetAddressData_declaration_child(postcode)
{
	whichField = 7;
	// only continue if xmlHttp isn't void
	if (SPLxmlHttp)
	{
		  // try to connect to the server
		  try
		  {
		  // initiate reading a file from the server
		  SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
		  SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
		  SPLxmlHttp.send(null);
		  }
		  // display the error in case of failure
		  catch (e)
		  {
		  //alert("Can't connect to server:\n" + e.toString());
		  //Suppress error, since can be cause by two calls at once
		  }
	  }
}

function SPLGetAddressData_special_events(postcode)
{
	whichField = 8;
	// only continue if xmlHttp isn't void
	if (SPLxmlHttp)
	{
		  // try to connect to the server
		  try
		  {
		  // initiate reading a file from the server
		  SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep1.php?postcode=" + escape(postcode), true);
		  SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
		  SPLxmlHttp.send(null);
		  }
		  // display the error in case of failure
		  catch (e)
		  {
		  //alert("Can't connect to server:\n" + e.toString());
		  //Suppress error, since can be cause by two calls at once
		  }
	  }
}

// #################### On Click on Combo ############################ 
 
// handles click on combo
function SPLAddressChange(AddressCombo)
{
		//   loading
		$('#address').val('Loading...');
		$('.'+divContainer).find('textarea').val('Loading...');
       // only continue if xmlHttp isn't void
       if (SPLxmlHttp)
       {
         // try to connect to the server
         try
         {
           // initiate reading a file from the server
           SPLxmlHttp.open("GET", SPL_URL+"/spl/SPLGetFullAddressStep2.php?AddressID=" + AddressCombo.options[AddressCombo.selectedIndex].value, true);
           SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
           SPLxmlHttp.send(null);
		  
		  //////////////////////////////////
		  // DAN HAS COMMENTED THIS BIT OUT
		  /////////////////////////////////
		   /*
		   var address_value = "";
		   var address = AddressCombo.options[AddressCombo.selectedIndex].text;
		 
		   var address_bits = address.split(" ");
		   var temp_str = "";
		   for (i=address_bits.length-1; i>=0; i--) { 
				var address_string = address_bits[i];
				if (temp_str !== "") address_string = address_string+" "+temp_str;
		   
				if (matchCounty(address_string) == true) {
					address_value = address_string+"\r\n"+address_value;
					temp_str = "";
				} else if (matchTown(address_string) == true) {
					address_value = address_string+"\r\n"+address_value;
					temp_str = "";
				} else if (matchCity(address_string) == true) {
					address_value = address_string+"\r\n"+address_value;
					temp_str = "";
				} else if (address_string.match(/^\d/)) {
				   address_value = address_string+"\r\n"+address_value;
					temp_str = "";
				} else {
					temp_str = address_string;
					
					if (i==0) {
						address_value = address_string+"\r\n"+address_value;
					}
				}				
			}
			
		   //document.getElementById("address").value = AddressCombo.options[AddressCombo.selectedIndex].text;
		   document.getElementById("address").value = address_value; */
         }
         // display the error in case of failure
         catch (e)
         {
           //alert("Can't connect to server:\n" + e.toString());
           //Suppress error, since can be cause by two calls at once
         }
  	}
	if (whichField == 2) document.getElementById("SPLSearchArea2").innerHTML = "";
	else if (whichField == 3) document.getElementById("SPLSearchArea").innerHTML = "";
	else if (whichField == 4) document.getElementById("SPLSearchAreas").innerHTML = "";
	else if (whichField == 5) document.getElementById("SPLSearchArea").innerHTML = "";
	else if (whichField == 6) document.getElementById("SPLSearchArea_owner").innerHTML = "";
	else if (whichField == 7) document.getElementById("SPLSearchAreas_child").innerHTML = "";
	else if (whichField == 8) document.getElementById("SPLSearchArea_event").innerHTML = "";
	else if (whichField == 9) $('#'+divContainer).html('');
	else document.getElementById("SPLSearchArea").innerHTML = "";
} 

function addLineBreaks(address){
	var address_value = "";
	var address_bits = address.split(" ");
	var temp_str = "";
	for (i=address_bits.length-1; i>=0; i--) { 
		var address_string = address_bits[i];
		if (temp_str !== "") address_string = address_string+" "+temp_str;

		if (matchCounty(address_string) == true) {
			address_value = address_string+"\r\n"+address_value;
			temp_str = "";
		} else if (matchTown(address_string) == true) {
			address_value = address_string+"\r\n"+address_value;
			temp_str = "";
		} else if (matchCity(address_string) == true) {
			address_value = address_string+"\r\n"+address_value;
			temp_str = "";
		} else if (address_string.match(/^\d/)) {
		   address_value = address_string+"\r\n"+address_value;
			temp_str = "";
		} else {
			temp_str = address_string;
			
			if (i==0) {
				address_value = address_string+"\r\n"+address_value;
			}
		}				
	}
	return address_value;
}

function matchCounty(string){
	var counties = ["Avon", "Bedfordshire", "Berkshire", "Borders", "Buckinghamshire", "Cambridgeshire", "Central", "Cheshire", "Cleveland", "Clwyd", "Cornwall"
				, "County Antrim", "County Armagh", "County Down", "County Fermanagh", "County Londonderry", "County Tyrone", "Cumbria", "Derbyshire", "Devon"
				, "Dorset", "Dumfries and Galloway", "Durham", "Dyfed", "East Sussex", "Essex", "Fife", "Gloucestershire", "Grampian", "Greater Manchester", "Gwent"
				, "Gwynedd County", "Hampshire", "Herefordshire", "Hertfordshire", "Highlands and Islands", "Humberside", "Isle of Wight", "Kent", "Lancashire"
				, "Leicestershire", "Lincolnshire", "Lothian", "Merseyside", "Mid Glamorgan", "Norfolk", "North Yorkshire", "Northamptonshire", "Northumberland"
				, "Nottinghamshire", "Oxfordshire", "Powys", "Rutland", "Shropshire", "Somerset", "South Glamorgan", "South Yorkshire", "Staffordshire", "Strathclyde"
				, "Suffolk", "Surrey", "Tayside", "Tyne and Wear", "Warwickshire", "West Glamorgan", "West Midlands", "West Sussex", "West Yorkshire", "Wiltshire", "Worcestershire"
				];
    var found = counties.indexOf(string);
	if (found > -1) return true;
	else return false;
}

function matchTown(string) {
	var towns = ["Aberaeron", "Aberdare", "Aberdeen", "Aberfeldy", "Abergavenny", "Abergele", "Abertillery", "Aberystwyth", "Abingdon", "Accrington", "Adlington", "Airdrie"
				, "Alcester", "Aldeburgh", "Aldershot", "Aldridge", "Alford", "Alfreton", "Alloa", "Alnwick", "Alsager", "Alston", "Amesbury", "Amlwch", "Ammanford", "Ampthill"
				, "Andover", "Annan", "Antrim", "Appleby in Westmorland", "Arbroath", "Armagh", "Arundel", "Ashbourne", "Ashburton", "Ashby de la Zouch", "Ashford", "Ashington"
				, "Ashton in Makerfield", "Atherstone", "Auchtermuchty", "Axminster", "Aylesbury", "Aylsham", "Ayr", "Bacup", "Bakewell", "Bala", "Ballater", "Ballycastle"
				, "Ballyclare", "Ballymena", "Ballymoney", "Ballynahinch", "Banbridge", "Banbury", "Banchory", "Banff", "Bangor", "Barmouth", "Barnard Castle", "Barnet"
				, "Barnoldswick", "Barnsley", "Barnstaple", "Barrhead", "Barrow in Furness", "Barry", "Barton upon Humber", "Basildon", "Basingstoke", "Bath", "Bathgate"
				, "Batley", "Battle", "Bawtry", "Beaconsfield", "Bearsden", "Beaumaris", "Bebington", "Beccles", "Bedale", "Bedford", "Bedlington", "Bedworth", "Beeston"
				, "Bellshill", "Belper", "Berkhamsted", "Berwick upon Tweed", "Betws y Coed", "Beverley", "Bewdley", "Bexhill on Sea", "Bicester", "Biddulph", "Bideford"
				, "Biggar", "Biggleswade", "Billericay", "Bilston", "Bingham", "Birkenhead", "Birmingham", "Bishop Auckland", "Blackburn", "Blackheath", "Blackpool"
				, "Blaenau Ffestiniog", "Blandford Forum", "Bletchley", "Bloxwich", "Blyth", "Bodmin", "Bognor Regis", "Bollington", "Bolsover", "Bolton", "Bootle", "Borehamwood"
				, "Boston", "Bourne", "Bournemouth", "Brackley", "Bracknell", "Bradford", "Bradford on Avon", "Brading", "Bradley Stoke", "Bradninch", "Braintree", "Brechin"
				, "Brecon", "Brentwood", "Bridge of Allan", "Bridgend", "Bridgnorth", "Bridgwater", "Bridlington", "Bridport", "Brigg", "Brighouse", "Brightlingsea", "Brighton"
				, "Bristol", "Brixham", "Broadstairs", "Bromsgrove", "Bromyard", "Brynmawr", "Buckfastleigh", "Buckie", "Buckingham", "Buckley", "Bude", "Budleigh Salterton"
				, "Builth Wells", "Bungay", "Buntingford", "Burford", "Burgess Hill", "Burnham on Crouch", "Burnham on Sea", "Burnley", "Burntisland", "Burntwood", "Burry Port"
				, "Burton Latimer", "Bury", "Bushmills", "Buxton", "Caernarfon", "Caerphilly", "Caistor", "Caldicot", "Callander", "Calne", "Camberley", "Camborne", "Cambridge"
				, "Camelford", "Campbeltown", "Cannock", "Canterbury", "Cardiff", "Cardigan", "Carlisle", "Carluke", "Carmarthen", "Carnforth", "Carnoustie", "Carrickfergus"
				, "Carterton", "Castle Douglas", "Castlederg", "Castleford", "Castlewellan", "Chard", "Charlbury", "Chatham", "Chatteris", "Chelmsford", "Cheltenham", "Chepstow"
				, "Chesham", "Cheshunt", "Chester", "Chester le Street", "Chesterfield", "Chichester", "Chippenham", "Chipping Campden", "Chipping Norton", "Chipping Sodbury"
				, "Chorley", "Christchurch", "Church Stretton", "Cinderford", "Cirencester", "Clacton on Sea", "Cleckheaton", "Cleethorpes", "Clevedon", "Clitheroe", "Clogher"
				, "Clydebank", "Coalisland", "Coalville", "Coatbridge", "Cockermouth", "Coggeshall", "Colchester", "Coldstream", "Coleraine", "Coleshill", "Colne", "Colwyn Bay"
				, "Comber", "Congleton", "Conwy", "Cookstown", "Corbridge", "Corby", "Coventry", "Cowbridge", "Cowdenbeath", "Cowes", "Craigavon", "Cramlington", "Crawley"
				, "Crayford", "Crediton", "Crewe", "Crewkerne", "Criccieth", "Crickhowell", "Crieff", "Cromarty", "Cromer", "Crowborough", "Crowthorne", "Crumlin", "Cuckfield"
				, "Cullen", "Cullompton", "Cumbernauld", "Cupar", "Cwmbran", "Dalbeattie", "Dalkeith", "Darlington", "Dartford", "Dartmouth", "Darwen", "Daventry", "Dawlish"
				, "Deal", "Denbigh", "Denton", "Derby", "Dereham", "Devizes", "Dewsbury", "Didcot", "Dingwall", "Dinnington", "Diss", "Dolgellau", "Donaghadee", "Doncaster"
				, "Dorchester", "Dorking", "Dornoch", "Dover", "Downham Market", "Downpatrick", "Driffield", "Dronfield", "Droylsden", "Dudley", "Dufftown", "Dukinfield"
				, "Dumbarton", "Dumfries", "Dunbar", "Dunblane", "Dundee", "Dunfermline", "Dungannon", "Dunoon", "Duns", "Dunstable", "Durham", "Dursley", "Easingwold"
				, "East Grinstead", "East Kilbride", "Eastbourne", "Eastleigh", "Eastwood", "Ebbw Vale", "Edenbridge", "Edinburgh", "Egham", "Elgin", "Ellesmere", "Ellesmere Port"
				, "Ely", "Enniskillen", "Epping", "Epsom", "Erith", "Esher", "Evesham", "Exeter", "Exmouth", "Eye", "Eyemouth", "Failsworth", "Fairford", "Fakenham", "Falkirk"
				, "Falkland", "Falmouth", "Fareham", "Faringdon", "Farnborough", "Farnham", "Farnworth", "Faversham", "Felixstowe", "Ferndown", "Filey", "Fintona", "Fishguard"
				, "Fivemiletown", "Fleet", "Fleetwood", "Flint", "Flitwick", "Folkestone", "Fordingbridge", "Forfar", "Forres", "Fort William", "Fowey", "Framlingham", "Fraserburgh"
				, "Frodsham", "Frome", "Gainsborough", "Galashiels", "Gateshead", "Gillingham", "Glasgow", "Glastonbury", "Glossop", "Gloucester", "Godalming", "Godmanchester"
				, "Goole", "Gorseinon", "Gosport", "Gourock", "Grange over Sands", "Grangemouth", "Grantham", "Grantown on Spey", "Gravesend", "Grays", "Great Yarmouth", "Greenock"
				, "Grimsby", "Guildford", "Haddington", "Hadleigh", "Hailsham", "Halesowen", "Halesworth", "Halifax", "Halstead", "Haltwhistle", "Hamilton", "Harlow", "Harpenden"
				, "Harrogate", "Hartlepool", "Harwich", "Haslemere", "Hastings", "Hatfield", "Havant", "Haverfordwest", "Haverhill", "Hawarden", "Hawick", "Hay on Wye", "Hayle"
				, "Haywards Heath", "Heanor", "Heathfield", "Hebden Bridge", "Helensburgh", "Helston", "Hemel Hempstead", "Henley on Thames", "Hereford", "Herne Bay", "Hertford"
				, "Hessle", "Heswall", "Hexham", "High Wycombe", "Higham Ferrers", "Highworth", "Hinckley", "Hitchin", "Hoddesdon", "Holmfirth", "Holsworthy", "Holyhead", "Holywell"
				, "Honiton", "Horley", "Horncastle", "Hornsea", "Horsham", "Horwich", "Houghton le Spring", "Hove", "Howden", "Hoylake", "Hucknall", "Huddersfield", "Hungerford"
				, "Hunstanton", "Huntingdon", "Huntly", "Hyde", "Hythe", "Ilford", "Ilfracombe", "Ilkeston", "Ilkley", "Ilminster", "Innerleithen", "Inveraray", "Inverkeithing"
				, "Inverness", "Inverurie", "Ipswich", "Irthlingborough", "Irvine", "Ivybridge", "Jarrow", "Jedburgh", "Johnstone", "Keighley", "Keith", "Kelso", "Kempston"
				, "Kendal", "Kenilworth", "Kesgrave", "Keswick", "Kettering", "Keynsham", "Kidderminster", "Kilbarchan", "Kilkeel", "Killyleagh", "Kilmarnock", "Kilwinning"
				, "Kinghorn", "Kingsbridge", "Kington", "Kingussie", "Kinross", "Kintore", "Kirkby", "Kirkby Lonsdale", "Kirkcaldy", "Kirkcudbright", "Kirkham", "Kirkwall"
				, "Kirriemuir", "Knaresborough", "Knighton", "Knutsford", "Ladybank", "Lampeter", "Lanark", "Lancaster", "Langholm", "Largs", "Larne", "Laugharne", "Launceston"
				, "Laurencekirk", "Leamington Spa", "Leatherhead", "Ledbury", "Leeds", "Leek", "Leicester", "Leighton Buzzard", "Leiston", "Leominster", "Lerwick", "Letchworth"
				, "Leven", "Lewes", "Leyland", "Lichfield", "Limavady", "Lincoln", "Linlithgow", "Lisburn", "Liskeard", "Lisnaskea", "Littlehampton", "Liverpool", "Llandeilo"
				, "Llandovery", "Llandrindod Wells", "Llandudno", "Llanelli", "Llanfyllin", "Llangollen", "Llanidloes", "Llanrwst", "Llantrisant", "Llantwit Major"
				, "Llanwrtyd Wells", "Loanhead", "Lochgilphead", "Lockerbie", "Londonderry", "Long Eaton", "Longridge", "Looe", "Lossiemouth", "Lostwithiel", "Loughborough"
				, "Loughton", "Louth", "Lowestoft", "Ludlow", "Lurgan", "Luton", "Lutterworth", "Lydd", "Lydney", "Lyme Regis", "Lymington", "Lynton", "Mablethorpe", "Macclesfield"
				, "Machynlleth", "Maesteg", "Magherafelt", "Maidenhead", "Maidstone", "Maldon", "Malmesbury", "Malton", "Malvern", "Manchester", "Manningtree", "Mansfield", "March"
				, "Margate", "Market Deeping", "Market Drayton", "Market Harborough", "Market Rasen", "Market Weighton", "Markethill", "Markinch", "Marlborough", "Marlow"
				, "Maryport", "Matlock", "Maybole", "Melksham", "Melrose", "Melton Mowbray", "Merthyr Tydfil", "Mexborough", "Middleham", "Middlesbrough", "Middlewich", "Midhurst"
				, "Midsomer Norton", "Milford Haven", "Milngavie", "Milton Keynes", "Minehead", "Moffat", "Mold", "Monifieth", "Monmouth", "Montgomery", "Montrose", "Morecambe"
				, "Moreton in Marsh", "Moretonhampstead", "Morley", "Morpeth", "Motherwell", "Musselburgh", "Nailsea", "Nailsworth", "Nairn", "Nantwich", "Narberth", "Neath"
				, "Needham Market", "Neston", "New Mills", "New Milton", "Newbury", "Newcastle", "Newcastle Emlyn", "Newcastle upon Tyne", "Newent", "Newhaven", "Newmarket"
				, "Newport", "Newport Pagnell", "Newport on Tay", "Newquay", "Newry", "Newton Abbot", "Newton Aycliffe", "Newton Stewart", "Newton le Willows", "Newtown"
				, "Newtownabbey", "Newtownards", "Normanton", "North Berwick", "North Walsham", "Northallerton", "Northampton", "Northwich", "Norwich", "Nottingham", "Nuneaton"
				, "Oakham", "Oban", "Okehampton", "Oldbury", "Oldham", "Oldmeldrum", "Olney", "Omagh", "Ormskirk", "Orpington", "Ossett", "Oswestry", "Otley", "Oundle", "Oxford"
				, "Padstow", "Paignton", "Painswick", "Paisley", "Peebles", "Pembroke", "Penarth", "Penicuik", "Penistone", "Penmaenmawr", "Penrith", "Penryn", "Penzance"
				, "Pershore", "Perth", "Peterborough", "Peterhead", "Peterlee", "Petersfield", "Petworth", "Pickering", "Pitlochry", "Pittenweem", "Plymouth", "Pocklington"
				, "Polegate", "Pontefract", "Pontypridd", "Poole", "Port Talbot", "Portadown", "Portaferry", "Porth", "Porthcawl", "Porthmadog", "Portishead", "Portrush"
				, "Portsmouth", "Portstewart", "Potters Bar", "Potton", "Poulton le Fylde", "Prescot", "Prestatyn", "Presteigne", "Preston", "Prestwick", "Princes Risborough"
				, "Prudhoe", "Pudsey", "Pwllheli", "Ramsgate", "Randalstown", "Rayleigh", "Reading", "Redcar", "Redditch", "Redhill", "Redruth", "Reigate", "Retford", "Rhayader"
				, "Rhuddlan", "Rhyl", "Richmond", "Rickmansworth", "Ringwood", "Ripley", "Ripon", "Rochdale", "Rochester", "Rochford", "Romford", "Romsey", "Ross on Wye"
				, "Rostrevor", "Rothbury", "Rotherham", "Rothesay", "Rowley Regis", "Royston", "Rugby", "Rugeley", "Runcorn", "Rushden", "Rutherglen", "Ruthin", "Ryde", "Rye"
				, "Saffron Walden", "Saintfield", "Salcombe", "Sale", "Salford", "Salisbury", "Saltash", "Saltcoats", "Sandbach", "Sandhurst", "Sandown", "Sandwich", "Sandy"
				, "Sawbridgeworth", "Saxmundham", "Scarborough", "Scunthorpe", "Seaford", "Seaton", "Sedgefield", "Selby", "Selkirk", "Selsey", "Settle", "Sevenoaks", "Shaftesbury"
				, "Shanklin", "Sheerness", "Sheffield", "Shepshed", "Shepton Mallet", "Sherborne", "Sheringham", "Shildon", "Shipston on Stour", "Shoreham by Sea", "Shrewsbury"
				, "Sidmouth", "Sittingbourne", "Skegness", "Skelmersdale", "Skipton", "Sleaford", "Slough", "Smethwick", "Soham", "Solihull", "Somerton", "South Molton"
				, "South Shields", "South Woodham Ferrers", "Southam", "Southampton", "Southborough", "Southend on Sea", "Southport", "Southsea", "Southwell", "Southwold"
				, "Spalding", "Spennymoor", "Spilsby", "Stafford", "Staines", "Stamford", "Stanley", "Staveley", "Stevenage", "Stirling", "Stockport", "Stockton on Tees"
				, "Stoke on Trent", "Stone", "Stowmarket", "Strabane", "Stranraer", "Stratford upon Avon", "Strood", "Stroud", "Sudbury", "Sunderland", "Sutton Coldfield"
				, "Sutton in Ashfield", "Swadlincote", "Swanage", "Swanley", "Swansea", "Swindon", "Tadcaster", "Tadley", "Tain", "Talgarth", "Tamworth", "Taunton", "Tavistock"
				, "Teignmouth", "Telford", "Tenby", "Tenterden", "Tetbury", "Tewkesbury", "Thame", "Thatcham", "Thaxted", "Thetford", "Thirsk", "Thornbury", "Thrapston", "Thurso"
				, "Tilbury", "Tillicoultry", "Tipton", "Tiverton", "Tobermory", "Todmorden", "Tonbridge", "Torpoint", "Torquay", "Totnes", "Totton", "Towcester", "Tredegar"
				, "Tregaron", "Tring", "Troon", "Trowbridge", "Truro", "Tunbridge Wells", "Tywyn", "Uckfield", "Ulverston", "Uppingham", "Usk", "Uttoxeter", "Ventnor", "Verwood"
				, "Wadebridge", "Wadhurst", "Wakefield", "Wallasey", "Wallingford", "Walsall", "Waltham Abbey", "Waltham Cross", "Walton on Thames", "Walton on the Naze", "Wantage"
				, "Ware", "Wareham", "Warminster", "Warrenpoint", "Warrington", "Warwick", "Washington", "Watford", "Wednesbury", "Wednesfield", "Wellingborough", "Wellington"
				, "Wells", "Wells next the Sea", "Welshpool", "Welwyn Garden City", "Wem", "Wendover", "West Bromwich", "Westbury", "Westerham", "Westhoughton", "Weston super Mare"
				, "Wetherby", "Weybridge", "Weymouth", "Whaley Bridge", "Whitby", "Whitchurch", "Whitehaven", "Whitley Bay", "Whitnash", "Whitstable", "Whitworth", "Wick"
				, "Wickford", "Widnes", "Wigan", "Wigston", "Wigtown", "Willenhall", "Wincanton", "Winchester", "Windermere", "Winsford", "Winslow", "Wisbech", "Witham"
				, "Withernsea", "Witney", "Woburn", "Woking", "Wokingham", "Wolverhampton", "Wombwell", "Woodbridge", "Woodstock", "Wootton Bassett", "Worcester", "Workington"
				, "Worksop", "Worthing", "Wotton under Edge", "Wrexham", "Wymondham", "Yarm", "Yarmouth", "Yate", "Yateley", "Yeadon", "Yeovil", "York"
				];
    var found = towns.indexOf(string);
	if (found > -1) return true;
	else return false;
}

function matchCity(string){
	var cities = ["Aberdeen","Armagh","Bangor","Bath","Belfast","Birmingham","Bradford","Brighton and Hove","Bristol","Cambridge","Canterbury","Cardiff","Carlisle","Chester"
				,"Chichester","City of London","Coventry","Derby","Dundee","Durham","Edinburgh","Ely","Exeter","Glasgow","Gloucester","Hereford","Inverness","Kingston upon Hull"
				,"Lancaster","Leeds","Leicester","Lichfield","Lincoln","Lisburn","Liverpool","Londonderry","Manchester","Newcastle upon Tyne","Newport","Newry","Norwich"
				,"Nottingham","Oxford","Peterborough","Plymouth","Portsmouth","Preston","Ripon","Salford","Salisbury","Sheffield","Southampton","St Albans","St Davids","Stirling"
				,"Stoke-on-Trent","Sunderland","Swansea","Truro","Wakefield","Wells","Westminster","Winchester","Wolverhampton","Worcester","York"
				];
    var found = cities.indexOf(string);
	if (found > -1) return true;
	else return false;
}
 
 
// #################### Handle returned data ############################ 
function SPLhandleServerResponse()
{
  //##########################################################
  //### Delete this line on production server              ###
  //### This can be used for debuging to show XML returned ###
//alert(SPLxmlHttp.responseText);
  //##########################################################

  // Test that XML contains valid Address, test for <line1>
  var Credits="",COMP="", LINE1="",LINE2="",LINE3="",TOWN="",COUNTY="",POSTCODE="",COUNTRY="",MultiLineAddress=""
  var XMLresponse = SPLxmlHttp.responseText;
  if (XMLresponse.indexOf("</select>")>0)
  {
      //if contains a </select> then must be combo box
	  if (whichField == 2) document.getElementById("SPLSearchArea2").innerHTML = XMLresponse;
	  else if (whichField == 4) document.getElementById("SPLSearchAreas").innerHTML = XMLresponse;
	  else if (whichField == 5) document.getElementById("SPLSearchArea").innerHTML = XMLresponse;
	  else if (whichField == 6) document.getElementById("SPLSearchArea_owner").innerHTML = XMLresponse;
	  else if (whichField == 7) document.getElementById("SPLSearchAreas_child").innerHTML = XMLresponse;
	  else if (whichField == 8) document.getElementById("SPLSearchArea_event").innerHTML = XMLresponse;
	  else if (whichField == 9) $('#'+divContainer).html(XMLresponse);
      else document.getElementById("SPLSearchArea").innerHTML = XMLresponse;  
  }
  else
  {
      if (XMLresponse.indexOf("<line1>")==-1)
           // error or no data so show message
		   if (whichField == 2) document.getElementById("SPLSearchArea2").innerHTML = XMLresponse;
		   else if (whichField == 4) document.getElementById("SPLSearchAreas").innerHTML = XMLresponse;
		   else if (whichField == 5) document.getElementById("SPLSearchArea").innerHTML = XMLresponse;
		   else if (whichField == 6) document.getElementById("SPLSearchArea_owner").innerHTML = XMLresponse;
		   else if (whichField == 7) document.getElementById("SPLSearchAreas_child").innerHTML = XMLresponse;
		   else if (whichField == 8) document.getElementById("SPLSearchArea_event").innerHTML = XMLresponse;
		   else if (whichField == 9) $('#'+divContainer).html(XMLresponse);
		   else document.getElementById("SPLSearchArea").innerHTML = XMLresponse;  
      else
      {
      	  //contains address information so write to fields
	  // read the message from the server
	  var xmlResponse = SPLxmlHttp.responseXML;

	  // obtain the XML's document element
	  xmlRoot = xmlResponse.documentElement;

		  if (xmlRoot.getElementsByTagName("credits_display_text").item(0).firstChild) 
		{Credits = xmlRoot.getElementsByTagName("credits_display_text").item(0).firstChild.data ;}
	
	  if (xmlRoot.getElementsByTagName("organisation").item(0).firstChild) 
		{COMP = xmlRoot.getElementsByTagName("organisation").item(0).firstChild.data;}

	  if (xmlRoot.getElementsByTagName("line1").item(0).firstChild) 
		{LINE1 = xmlRoot.getElementsByTagName("line1").item(0).firstChild.data;}

	  if (xmlRoot.getElementsByTagName("line2").item(0).firstChild) 
		{LINE2 = xmlRoot.getElementsByTagName("line2").item(0).firstChild.data;}

	  if (xmlRoot.getElementsByTagName("line3").item(0).firstChild) 
		{LINE3 = xmlRoot.getElementsByTagName("line3").item(0).firstChild.data;}

	  if (xmlRoot.getElementsByTagName("town").item(0).firstChild) 	
		{TOWN = xmlRoot.getElementsByTagName("town").item(0).firstChild.data;}

	  if (xmlRoot.getElementsByTagName("county").item(0).firstChild) 
		{COUNTY = xmlRoot.getElementsByTagName("county").item(0).firstChild.data;}

	  if (xmlRoot.getElementsByTagName("postcode").item(0).firstChild) 
		{POSTCODE = xmlRoot.getElementsByTagName("postcode").item(0).firstChild.data;}

	  if (xmlRoot.getElementsByTagName("country").item(0).firstChild) 
		{COUNTRY = xmlRoot.getElementsByTagName("country").item(0).firstChild.data;}

	//////////////////////////////////////////////
	// AS WE DONT USE INDIVIDUAL FIELDS, THE FOLLOWING
	// IS COMMENTED OUT
	//////////////////////////////////////////////

	/*document.getElementById("company").value=COMP;
	document.getElementById("postcode").value=POSTCODE;
	document.getElementById("line1").value=LINE1;
	document.getElementById("line2").value=LINE2;
	document.getElementById("line3").value=LINE3;
	document.getElementById("town").value=TOWN;
	document.getElementById("county").value=COUNTY;
	document.getElementById("country").value=COUNTRY;*/
	
	
	// Multi line
	if (COMP!="") {MultiLineAddress = MultiLineAddress  + COMP + "\n"}
	if (LINE1!="") {MultiLineAddress = MultiLineAddress + LINE1 + "\n"}
	if (LINE2!="") {MultiLineAddress = MultiLineAddress + LINE2 + "\n"}
	if (LINE3!="") {MultiLineAddress = MultiLineAddress + LINE3 + "\n"}
	if (TOWN!="") {MultiLineAddress = MultiLineAddress + TOWN + "\n"}
	if (COUNTY!="") {MultiLineAddress = MultiLineAddress + COUNTY + "\n"}
	//if (POSTCODE!="") {MultiLineAddress = MultiLineAddress + POSTCODE + "\n"}	// WE DONT WANT POSTCODE IN THE RESULT AS IT IS HELD IN A SEPARATE FIELD
	//if (COUNTRY!="") {MultiLineAddress = MultiLineAddress + COUNTRY + "\n"} //WE DON'T WANT COUNTRY IN THE RESULT
	
	////////////////////////////////////////////////////
	// THIS FIELD MUST MATCH THE FORM FIELD WHERE THE RESULT SHOULD BE SEEN
	////////////////////////////////////////////////////
	if (whichField == 2) document.getElementById("address2").value=MultiLineAddress;
	else if (whichField == 3) document.getElementById("address").value=MultiLineAddress;
	else if (whichField == 4) document.getElementById("person_address").value=MultiLineAddress;
	else if (whichField == 5) document.getElementById("res_address").value=MultiLineAddress;
	else if (whichField == 6) document.getElementById("address").value=MultiLineAddress;
	else if (whichField == 7) document.getElementById("child_address").value=MultiLineAddress;
	else if (whichField == 8) document.getElementById("event_address").value=MultiLineAddress;
	else if (whichField == 9) $('.'+divContainer).find('textarea').val(MultiLineAddress);
	else document.getElementById("address").value=MultiLineAddress;

      }
  }
}

 
