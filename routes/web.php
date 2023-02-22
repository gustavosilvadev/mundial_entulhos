<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CallDemandController;
use App\Http\Controllers\DumpsterServiceDemandController;
use App\Http\Controllers\ClientInfoPaymentController;
use App\Http\Controllers\LandfillController;
// use Illuminate\Http\Request;




Route::get('/', function ():array {
    
    // return view('welcome');
    return ['code'=>200,"response"=>"Success"];
});


//Client
// Route::get('/client/{id?}', [ClientController::class, 'showClient']);
// Route::post('/client', [ClientController::class, 'store']);
// Route::get('/client/{id?}', [ClientController::class, 'showClient']);


// Client
Route::get('createclient', function(){
    return view('client.form_cad_client');
});

Route::post('/save_client',[ClientController::class,'store']);
Route::get('client/{id?}',[ClientController::class,'show']);
Route::post('/update_client',[ClientController::class,'update']);
Route::get('/del_client/{id}',[ClientController::class,'destroy']);


//Employee
Route::get('createemployee', function(){
    return view('employee.form_cad_employee');
});

Route::post('save_employee',[EmployeeController::class,'store']);
Route::get('employee/{id?}',[EmployeeController::class,'show']);
Route::post('/update_employee',[EmployeeController::class,'update']);
Route::get('/del_employee/{id}',[EmployeeController::class,'destroy']);

// Driver
Route::get('createdriver', [DriverController::class,'showEmployee']);
Route::post('/save_driver',[DriverController::class,'store']);
// Route::get('driver/{id?}',[DriverController::class,'show']);
// Route::post('/update_driver',[DriverController::class,'update']);
// Route::get('/del_driver/{id}',[DriverController::class,'destroy']);


// Landfill
Route::get('createlandfill', function(){
    return view('landfill.form_cad_landfill');
});
Route::post('save_landfill',[LandfillController::class,'store']);


// Call Demand
Route::get('createcalldemand', [CallDemandController::class,'showNameClient']);
Route::post('save_call_demand',[CallDemandController::class,'store']);
Route::get('call_demand/{id?}',[CallDemandController::class,'show']);

Route::get("teste_lista_items/{id?}", [CallDemandController::class, 'showAPI']);

/*
Route::get("teste_lista_items", function(){

    return redirect('call_demand');
    die();
    return '{
        "data": [
        {
            "responsive_id": "",
            "id": 12,
            "avatar": "",
            "full_name": "Cyrus Gornal",
            "post": "Senior Sales Associate",
            "email": "cgornalb@fda.gov",
            "city": "Boro Utara",
            "start_date": "12/09/2017",
            "salary": "$16745.47",
            "age": "22",
            "experience": "2 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 13,
            "avatar": "",
            "full_name": "Tallou Balf",
            "post": "Staff Accountant",
            "email": "tbalfc@sina.com.cn",
            "city": "Siliana",
            "start_date": "01/21/2016",
            "salary": "$15488.53",
            "age": "36",
            "experience": "6 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 14,
            "avatar": "",
            "full_name": "Othilia Extill",
            "post": "Associate Professor",
            "email": "oextilld@theatlantic.com",
            "city": "Brzyska",
            "start_date": "02/01/2016",
            "salary": "$18442.34",
            "age": "43",
            "experience": "3 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 15,
            "avatar": "",
            "full_name": "Wilmar Bourton",
            "post": "Administrative Assistant",
            "email": "wbourtone@sakura.ne.jp",
            "city": "Bích Động",
            "start_date": "04/25/2018",
            "salary": "$13304.45",
            "age": "19",
            "experience": "9 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 16,
            "avatar": "4-small.png",
            "full_name": "Robinson Brazenor",
            "post": "General Manager",
            "email": "rbrazenorf@symantec.com",
            "city": "Gendiwu",
            "start_date": "12/23/2017",
            "salary": "$11953.08",
            "age": "66",
            "experience": "6 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 17,
            "avatar": "",
            "full_name": "Nadia Bettenson",
            "post": "Environmental Tech",
            "email": "nbettensong@joomla.org",
            "city": "Chabařovice",
            "start_date": "07/11/2018",
            "salary": "$20484.44",
            "age": "64",
            "experience": "4 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 18,
            "avatar": "",
            "full_name": "Titus Hayne",
            "post": "Web Designer",
            "email": "thayneh@kickstarter.com",
            "city": "Yangon",
            "start_date": "05/25/2019",
            "salary": "$16871.48",
            "age": "59",
            "experience": "9 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 19,
            "avatar": "5-small.png",
            "full_name": "Roxie Huck",
            "post": "Administrative Assistant",
            "email": "rhucki@ed.gov",
            "city": "Polýkastro",
            "start_date": "04/04/2019",
            "salary": "$19653.56",
            "age": "41",
            "experience": "1 Year",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 20,
            "avatar": "7-small.png",
            "full_name": "Latashia Lewtey",
            "post": "Actuary",
            "email": "llewteyj@sun.com",
            "city": "Hougong",
            "start_date": "08/03/2017",
            "salary": "$18303.87",
            "age": "35",
            "experience": "5 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 21,
            "avatar": "",
            "full_name": "Natalina Tyne",
            "post": "Software Engineer",
            "email": "ntynek@merriam-webster.com",
            "city": "Yanguan",
            "start_date": "03/16/2019",
            "salary": "$15256.40",
            "age": "30",
            "experience": "0 Year",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 22,
            "avatar": "",
            "full_name": "Faun Josefsen",
            "post": "Analog Circuit Design manager",
            "email": "fjosefsenl@samsung.com",
            "city": "Wengyang",
            "start_date": "07/08/2017",
            "salary": "$11209.16",
            "age": "40",
            "experience": "0 Year",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 23,
            "avatar": "9-small.png",
            "full_name": "Rosmunda Steed",
            "post": "Assistant Media Planner",
            "email": "rsteedm@xing.com",
            "city": "Manzanares",
            "start_date": "12/23/2017",
            "salary": "$13778.34",
            "age": "21",
            "experience": "1 Year",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 24,
            "avatar": "",
            "full_name": "Scott Jiran",
            "post": "Graphic Designer",
            "email": "sjirann@simplemachines.org",
            "city": "Pinglin",
            "start_date": "05/26/2016",
            "salary": "$23081.71",
            "age": "23",
            "experience": "3 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 25,
            "avatar": "",
            "full_name": "Carmita Medling",
            "post": "Accountant",
            "email": "cmedlingo@hp.com",
            "city": "Bourges",
            "start_date": "07/31/2019",
            "salary": "$13602.24",
            "age": "47",
            "experience": "7 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 26,
            "avatar": "2-small.png",
            "full_name": "Morgen Benes",
            "post": "Senior Sales Associate",
            "email": "mbenesp@ted.com",
            "city": "Cà Mau",
            "start_date": "04/10/2016",
            "salary": "$16969.63",
            "age": "42",
            "experience": "2 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 27,
            "avatar": "",
            "full_name": "Onfroi Doughton",
            "post": "Civil Engineer",
            "email": "odoughtonq@aboutads.info",
            "city": "Utrecht (stad)",
            "start_date": "09/29/2018",
            "salary": "$23796.62",
            "age": "28",
            "experience": "8 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 28,
            "avatar": "",
            "full_name": "Kliment McGinney",
            "post": "Chief Design Engineer",
            "email": "kmcginneyr@paginegialle.it",
            "city": "Xiaocheng",
            "start_date": "07/09/2018",
            "salary": "$24027.81",
            "age": "28",
            "experience": "8 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 29,
            "avatar": "",
            "full_name": "Devin Bridgland",
            "post": "Tax Accountant",
            "email": "dbridglands@odnoklassniki.ru",
            "city": "Baoli",
            "start_date": "07/17/2016",
            "salary": "$13508.15",
            "age": "48",
            "experience": "8 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 30,
            "avatar": "6-small.png",
            "full_name": "Gilbert McFade",
            "post": "Biostatistician",
            "email": "gmcfadet@irs.gov",
            "city": "Deje",
            "start_date": "08/28/2018",
            "salary": "$21632.30",
            "age": "20",
            "experience": "0 Year",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 31,
            "avatar": "",
            "full_name": "Teressa Bleakman",
            "post": "Senior Editor",
            "email": "tbleakmanu@phpbb.com",
            "city": "Žebrák",
            "start_date": "09/03/2016",
            "salary": "$24875.41",
            "age": "37",
            "experience": "7 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 32,
            "avatar": "",
            "full_name": "Marcelia Alleburton",
            "post": "Safety Technician",
            "email": "malleburtonv@amazon.com",
            "city": "Basail",
            "start_date": "06/02/2016",
            "salary": "$23888.98",
            "age": "53",
            "experience": "3 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 33,
            "avatar": "7-small.png",
            "full_name": "Aili De Coursey",
            "post": "Environmental Specialist",
            "email": "adew@etsy.com",
            "city": "Łazy",
            "start_date": "09/30/2016",
            "salary": "$14082.44",
            "age": "27",
            "experience": "7 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 34,
            "avatar": "6-small.png",
            "full_name": "Charlton Chatres",
            "post": "Analyst Programmer",
            "email": "cchatresx@goo.gl",
            "city": "Reguengos de Monsaraz",
            "start_date": "04/07/2016",
            "salary": "$21386.52",
            "age": "22",
            "experience": "2 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 35,
            "avatar": "1-small.png",
            "full_name": "Nat Hugonnet",
            "post": "Financial Advisor",
            "email": "nhugonnety@wufoo.com",
            "city": "Pimentel",
            "start_date": "09/11/2019",
            "salary": "$13835.97",
            "age": "46",
            "experience": "6 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 36,
            "avatar": "",
            "full_name": "Lorine Hearsum",
            "post": "Payment Adjustment Coordinator",
            "email": "lhearsumz@google.co.uk",
            "city": "Shuiying",
            "start_date": "03/05/2019",
            "salary": "$22093.91",
            "age": "47",
            "experience": "7 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 37,
            "avatar": "8-small.png",
            "full_name": "Sheila-kathryn Haborn",
            "post": "Environmental Specialist",
            "email": "shaborn10@about.com",
            "city": "Lewolang",
            "start_date": "11/10/2018",
            "salary": "$24624.23",
            "age": "51",
            "experience": "1 Year",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 38,
            "avatar": "3-small.png",
            "full_name": "Alma Harvatt",
            "post": "Administrative Assistant",
            "email": "aharvatt11@addtoany.com",
            "city": "Ulundi",
            "start_date": "11/04/2016",
            "salary": "$21782.82",
            "age": "41",
            "experience": "1 Year",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 39,
            "avatar": "2-small.png",
            "full_name": "Beatrix Longland",
            "post": "VP Quality Control",
            "email": "blongland12@gizmodo.com",
            "city": "Damu",
            "start_date": "07/18/2016",
            "salary": "$22794.60",
            "age": "62",
            "experience": "2 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 40,
            "avatar": "4-small.png",
            "full_name": "Hammad Condell",
            "post": "Project Manager",
            "email": "hcondell13@tiny.cc",
            "city": "Bulung’ur",
            "start_date": "11/04/2018",
            "salary": "$10872.83",
            "age": "37",
            "experience": "7 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 41,
            "avatar": "",
            "full_name": "Parker Bice",
            "post": "Technical Writer",
            "email": "pbice14@ameblo.jp",
            "city": "Shanlian",
            "start_date": "03/02/2016",
            "salary": "$17471.92",
            "age": "65",
            "experience": "5 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 42,
            "avatar": "",
            "full_name": "Lowrance Orsi",
            "post": "Biostatistician",
            "email": "lorsi15@wp.com",
            "city": "Dengteke",
            "start_date": "12/10/2018",
            "salary": "$24719.51",
            "age": "64",
            "experience": "4 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 43,
            "avatar": "10-small.png",
            "full_name": "Ddene Chaplyn",
            "post": "Environmental Tech",
            "email": "dchaplyn16@nymag.com",
            "city": "Lattes",
            "start_date": "01/23/2019",
            "salary": "$11958.33",
            "age": "38",
            "experience": "8 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 44,
            "avatar": "",
            "full_name": "Washington Bygraves",
            "post": "Human Resources Manager",
            "email": "wbygraves17@howstuffworks.com",
            "city": "Zlaté Hory",
            "start_date": "09/07/2016",
            "salary": "$10552.43",
            "age": "37",
            "experience": "7 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 45,
            "avatar": "7-small.png",
            "full_name": "Meghann Bodechon",
            "post": "Operator",
            "email": "mbodechon18@1und1.de",
            "city": "Itō",
            "start_date": "07/23/2018",
            "salary": "$23024.28",
            "age": "61",
            "experience": "1 Year",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 46,
            "avatar": "1-small.png",
            "full_name": "Moshe De Ambrosis",
            "post": "Recruiting Manager",
            "email": "mde19@purevolume.com",
            "city": "San Diego",
            "start_date": "02/10/2018",
            "salary": "$10409.90",
            "age": "47",
            "experience": "7 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 47,
            "avatar": "5-small.png",
            "full_name": "Had Chatelot",
            "post": "Cost Accountant",
            "email": "hchatelot1a@usatoday.com",
            "city": "Mercedes",
            "start_date": "11/23/2016",
            "salary": "$11446.30",
            "age": "64",
            "experience": "4 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 48,
            "avatar": "",
            "full_name": "Georgia McCrum",
            "post": "Registered Nurse",
            "email": "gmccrum1b@icio.us",
            "city": "Nggalak",
            "start_date": "04/19/2018",
            "salary": "$14002.31",
            "age": "63",
            "experience": "3 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 49,
            "avatar": "8-small.png",
            "full_name": "Krishnah Stilldale",
            "post": "VP Accounting",
            "email": "kstilldale1c@chronoengine.com",
            "city": "Slavs’ke",
            "start_date": "03/18/2017",
            "salary": "$10704.29",
            "age": "56",
            "experience": "6 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 50,
            "avatar": "4-small.png",
            "full_name": "Mario Umbert",
            "post": "Research Assistant",
            "email": "mumbert1d@digg.com",
            "city": "Chorotis",
            "start_date": "05/13/2019",
            "salary": "$21813.54",
            "age": "43",
            "experience": "3 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 51,
            "avatar": "",
            "full_name": "Edvard Dixsee",
            "post": "Graphic Designer",
            "email": "edixsee1e@unblog.fr",
            "city": "Rancharia",
            "start_date": "04/23/2019",
            "salary": "$18053.11",
            "age": "46",
            "experience": "6 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 52,
            "avatar": "9-small.png",
            "full_name": "Tammie Davydoch",
            "post": "VP Quality Control",
            "email": "tdavydoch1f@examiner.com",
            "city": "Mamedkala",
            "start_date": "04/19/2016",
            "salary": "$17617.08",
            "age": "47",
            "experience": "7 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 53,
            "avatar": "",
            "full_name": "Benito Rodolico",
            "post": "Safety Technician",
            "email": "brodolico1g@sciencedirect.com",
            "city": "Wonosobo",
            "start_date": "10/06/2018",
            "salary": "$18866.55",
            "age": "21",
            "experience": "1 Year",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 54,
            "avatar": "",
            "full_name": "Marco Pennings",
            "post": "Compensation Analyst",
            "email": "mpennings1h@bizjournals.com",
            "city": "Umag",
            "start_date": "06/15/2017",
            "salary": "$13722.18",
            "age": "30",
            "experience": "0 Year",
            "status": 3
        },
        
        {
            "responsive_id": "",
            "id": 66,
            "avatar": "9-small.png",
            "full_name": "Christos Kiley",
            "post": "Geologist",
            "email": "ckiley1t@buzzfeed.com",
            "city": "El Bolsón",
            "start_date": "02/27/2019",
            "salary": "$16053.15",
            "age": "46",
            "experience": "2 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 67,
            "avatar": "7-small.png",
            "full_name": "Silvain Siebert",
            "post": "VP Sales",
            "email": "ssiebert1u@domainmarket.com",
            "city": "Cadiz",
            "start_date": "09/23/2017",
            "salary": "$23347.17",
            "age": "47",
            "experience": "8 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 68,
            "avatar": "",
            "full_name": "Sharla Ibberson",
            "post": "Payment Adjustment Coordinator",
            "email": "sibberson1v@virginia.edu",
            "city": "Lamam",
            "start_date": "11/01/2016",
            "salary": "$15658.40",
            "age": "51",
            "experience": "8 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 69,
            "avatar": "7-small.png",
            "full_name": "Ripley Rentcome",
            "post": "Physical Therapy Assistant",
            "email": "rrentcome1w@youtu.be",
            "city": "Dashkawka",
            "start_date": "07/15/2018",
            "salary": "$15396.66",
            "age": "41",
            "experience": "8 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 70,
            "avatar": "",
            "full_name": "Chrisse Birrane",
            "post": "Chemical Engineer",
            "email": "cbirrane1x@google.com.br",
            "city": "Las Toscas",
            "start_date": "05/22/2016",
            "salary": "$15823.40",
            "age": "62",
            "experience": "0 Year",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 71,
            "avatar": "",
            "full_name": "Georges Tesyro",
            "post": "Human Resources Manager",
            "email": "gtesyro1y@last.fm",
            "city": "Gabao",
            "start_date": "01/27/2019",
            "salary": "$19051.25",
            "age": "37",
            "experience": "7 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 72,
            "avatar": "",
            "full_name": "Bondon Hazard",
            "post": "Geological Engineer",
            "email": "bhazard1z@over-blog.com",
            "city": "Llano de Piedra",
            "start_date": "01/17/2019",
            "salary": "$11632.84",
            "age": "65",
            "experience": "3 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 73,
            "avatar": "5-small.png",
            "full_name": "Aliza MacElholm",
            "post": "VP Sales",
            "email": "amacelholm20@printfriendly.com",
            "city": "Sosnovyy Bor",
            "start_date": "11/17/2017",
            "salary": "$16741.31",
            "age": "64",
            "experience": "7 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 74,
            "avatar": "2-small.png",
            "full_name": "Lucas Witherdon",
            "post": "Senior Quality Engineer",
            "email": "lwitherdon21@storify.com",
            "city": "Staré Křečany",
            "start_date": "09/26/2016",
            "salary": "$19387.76",
            "age": "38",
            "experience": "2 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 75,
            "avatar": "",
            "full_name": "Pegeen Peasegod",
            "post": "Web Designer",
            "email": "ppeasegod22@slideshare.net",
            "city": "Keda",
            "start_date": "05/21/2016",
            "salary": "$24014.04",
            "age": "59",
            "experience": "6 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 76,
            "avatar": "",
            "full_name": "Elyn Watkinson",
            "post": "Structural Analysis Engineer",
            "email": "ewatkinson23@blogspot.com",
            "city": "Osan",
            "start_date": "09/30/2016",
            "salary": "$14493.51",
            "age": "55",
            "experience": "7 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 77,
            "avatar": "10-small.png",
            "full_name": "Babb Skirving",
            "post": "Analyst Programmer",
            "email": "bskirving24@cbsnews.com",
            "city": "Balky",
            "start_date": "09/27/2016",
            "salary": "$24733.28",
            "age": "39",
            "experience": "1 Year",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 78,
            "avatar": "",
            "full_name": "Shelli Ondracek",
            "post": "Financial Advisor",
            "email": "sondracek25@plala.or.jp",
            "city": "Aoluguya Ewenke Minzu",
            "start_date": "03/28/2016",
            "salary": "$21922.17",
            "age": "23",
            "experience": "1 Year",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 79,
            "avatar": "9-small.png",
            "full_name": "Stanislaw Melloy",
            "post": "Sales Associate",
            "email": "smelloy26@fastcompany.com",
            "city": "Funafuti",
            "start_date": "04/13/2017",
            "salary": "$16944.42",
            "age": "30",
            "experience": "2 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 80,
            "avatar": "",
            "full_name": "Seamus Eisikovitsh",
            "post": "Legal Assistant",
            "email": "seisikovitsh27@usgs.gov",
            "city": "Cangkringan",
            "start_date": "05/28/2018",
            "salary": "$21963.69",
            "age": "22",
            "experience": "7 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 81,
            "avatar": "2-small.png",
            "full_name": "Tammie Wattins",
            "post": "Web Designer",
            "email": "twattins28@statcounter.com",
            "city": "Xilin",
            "start_date": "08/07/2018",
            "salary": "$16049.93",
            "age": "36",
            "experience": "5 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 82,
            "avatar": "8-small.png",
            "full_name": "Aila Quailadis",
            "post": "Technical Writer",
            "email": "aquail29@prlog.org",
            "city": "Shuangchahe",
            "start_date": "02/11/2018",
            "salary": "$24137.29",
            "age": "43",
            "experience": "4 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 83,
            "avatar": "",
            "full_name": "Myrvyn Gilogly",
            "post": "Research Associate",
            "email": "mgilogly2a@elpais.com",
            "city": "Prince Rupert",
            "start_date": "05/13/2018",
            "salary": "$10089.96",
            "age": "19",
            "experience": "8 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 84,
            "avatar": "5-small.png",
            "full_name": "Hanna Langthorne",
            "post": "Analyst Programmer",
            "email": "hlangthorne2b@stumbleupon.com",
            "city": "Guaynabo",
            "start_date": "11/11/2018",
            "salary": "$14227.10",
            "age": "21",
            "experience": "7 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 85,
            "avatar": "",
            "full_name": "Ruby Gimblet",
            "post": "Registered Nurse",
            "email": "rgimblet2c@1688.com",
            "city": "Nanyulinxi",
            "start_date": "03/28/2016",
            "salary": "$19562.59",
            "age": "30",
            "experience": "1 Year",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 86,
            "avatar": "4-small.png",
            "full_name": "Louis Paszak",
            "post": "Programmer",
            "email": "lpaszak2d@behance.net",
            "city": "Chiscas",
            "start_date": "04/25/2016",
            "salary": "$17178.86",
            "age": "51",
            "experience": "7 Years",
            "status": 5
        },
        {
            "responsive_id": "",
            "id": 87,
            "avatar": "",
            "full_name": "Glennie Riolfi",
            "post": "Computer Systems Analyst",
            "email": "griolfi2e@drupal.org",
            "city": "Taung",
            "start_date": "06/18/2018",
            "salary": "$15089.83",
            "age": "29",
            "experience": "4 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 88,
            "avatar": "",
            "full_name": "Jemimah Morgan",
            "post": "Staff Accountant",
            "email": "jmorgan2f@nifty.com",
            "city": "La Esperanza",
            "start_date": "01/17/2016",
            "salary": "$18330.72",
            "age": "27",
            "experience": "3 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 89,
            "avatar": "10-small.png",
            "full_name": "Talya Brandon",
            "post": "Food Chemist",
            "email": "tbrandon2g@ucoz.com",
            "city": "Zaječar",
            "start_date": "10/08/2018",
            "salary": "$16284.64",
            "age": "28",
            "experience": "6 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 90,
            "avatar": "6-small.png",
            "full_name": "Renate Shay",
            "post": "Recruiter",
            "email": "rshay2h@tumblr.com",
            "city": "Pueblo Viejo",
            "start_date": "03/15/2017",
            "salary": "$18523.75",
            "age": "28",
            "experience": "3 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 91,
            "avatar": "",
            "full_name": "Julianne Bartosik",
            "post": "Senior Cost Accountant",
            "email": "jbartosik2i@state.gov",
            "city": "Botlhapatlou",
            "start_date": "02/06/2017",
            "salary": "$17607.66",
            "age": "48",
            "experience": "6 Years",
            "status": 3
        },
        {
            "responsive_id": "",
            "id": 92,
            "avatar": "3-small.png",
            "full_name": "Yvonne Emberton",
            "post": "Recruiter",
            "email": "yemberton2j@blog.com",
            "city": "Nagcarlan",
            "start_date": "02/13/2017",
            "salary": "$17550.18",
            "age": "20",
            "experience": "1 Year",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 93,
            "avatar": "8-small.png",
            "full_name": "Danya Faichnie",
            "post": "Social Worker",
            "email": "dfaichnie2k@weather.com",
            "city": "Taling",
            "start_date": "07/29/2019",
            "salary": "$18469.35",
            "age": "37",
            "experience": "3 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 94,
            "avatar": "",
            "full_name": "Ronica Hasted",
            "post": "Software Consultant",
            "email": "rhasted2l@hexun.com",
            "city": "Gangkou",
            "start_date": "07/04/2019",
            "salary": "$24866.66",
            "age": "53",
            "experience": "7 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 95,
            "avatar": "2-small.png",
            "full_name": "Edwina Ebsworth",
            "post": "Human Resources Assistant",
            "email": "eebsworth2m@sbwire.com",
            "city": "Puzi",
            "start_date": "09/27/2018",
            "salary": "$19586.23",
            "age": "27",
            "experience": "2 Years",
            "status": 1
        },
        {
            "responsive_id": "",
            "id": 96,
            "avatar": "",
            "full_name": "Alaric Beslier",
            "post": "Tax Accountant",
            "email": "abeslier2n@zimbio.com",
            "city": "Ocucaje",
            "start_date": "04/16/2017",
            "salary": "$19366.53",
            "age": "22",
            "experience": "8 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 97,
            "avatar": "",
            "full_name": "Reina Peckett",
            "post": "Quality Control Specialist",
            "email": "rpeckett2o@timesonline.co.uk",
            "city": "Anyang",
            "start_date": "05/20/2018",
            "salary": "$16619.40",
            "age": "46",
            "experience": "8 Years",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 98,
            "avatar": "7-small.png",
            "full_name": "Olivette Gudgin",
            "post": "Paralegal",
            "email": "ogudgin2p@gizmodo.com",
            "city": "Fujinomiya",
            "start_date": "04/09/2019",
            "salary": "$15211.60",
            "age": "47",
            "experience": "8 Years",
            "status": 2
        },
        {
            "responsive_id": "",
            "id": 99,
            "avatar": "10-small.png",
            "full_name": "Evangelina Carnock",
            "post": "Cost Accountant",
            "email": "ecarnock2q@washington.edu",
            "city": "Doushaguan",
            "start_date": "01/26/2017",
            "salary": "$23704.82",
            "age": "51",
            "experience": "0 Year",
            "status": 4
        },
        {
            "responsive_id": "",
            "id": 100,
            "avatar": "",
            "full_name": "Glyn Giacoppo",
            "post": "Software Test Engineer",
            "email": "ggiacoppo2r@apache.org",
            "city": "Butha-Buthe",
            "start_date": "04/15/2017",
            "salary": "$24973.48",
            "age": "41",
            "experience": "7 Years",
            "status": 2
        }
        ]
    }
    ';
});
*/


// Route::post('update_call_demand',[CallDemandController::class,'update']);
// Route::get('del_call_demand/{id}',[CallDemandController::class,'destroy']);

// Dumpsdumpster service demand
Route::get('createdumpsterservicedemand', [DumpsterServiceDemandController::class,'showNameDriverDemand']);
Route::post('save_dumpster_service_demand',[DumpsterServiceDemandController::class,'store']);
// Route::get('dumpster_service_demand/{id?}',[DumpsterServiceDemandController::class,'show']);


// Client Info Payment
// Route::get('clientinfopayment/{id?}', [ClientInfoPaymentController::class,'showInfoClientInfoPayment']);
Route::get('clientinfopayment', [ClientInfoPaymentController::class,'showInfoClientInfoPayment']);
Route::post('save_client_info_payment',[ClientInfoPaymentController::class,'store']);
// Route::get('dumpster_service_demand/{id?}',[DumpsterServiceDemandController::class,'show']);