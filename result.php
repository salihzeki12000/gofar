<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>AJAX Search filter demo</title>

</head>
<body>
<input class='btn' type='button' value='show'>
<h1>Demo</h1>
<p id='data'></p>
<div>
<h2>Filter options</h2>
<div>
<input type="checkbox" id="car" name="type">
<label for="car">Golf</label>
</div>
<div>
<input type="checkbox" id="language" name="rating">
<label for="language">Rating</label>
</div>
<div>
<input type="checkbox" id="nights" name="category">
<label for="nights">Land</label>
</div>
<div>
<input type="checkbox" id="student" name="isStudent">
<label for="student">Is a student</label>
</div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
function makeTable(data){
var tbl_body = "";
$.each(data, function() {
var tbl_row = "";
$.each(this, function(k , v) {
tbl_row += "<div>"+v+"/"+"</div>";
})
tbl_body += "<div>"+tbl_row+"</div>";
})
return tbl_body;
}
function getEmployeeFilterOptions(){
var opts = [];
$checkboxes.each(function(){
if(this.checked){
opts.push(this.name);
}
});
return opts;
}
function updateEmployees(opts){
$.ajax({
type: "POST",
url: "search.php",
dataType : 'json',
cache: false,
data: {filterOpts: opts},
success: function(records){
$('#data').html(makeTable(records));
}
});
}
var $checkboxes = $("input:checkbox");
$checkboxes.on("change", function(){
var opts = getEmployeeFilterOptions();
updateEmployees(opts);
});
 
</script>
<script>
$('.btn').click(function(){

var data=$('#data').text();
alert(data);
	});
</script>
</body>
</html>