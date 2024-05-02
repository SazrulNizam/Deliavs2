<?php

require_once("../config.php");
global $CFG, $DB, $USER;
require_once($CFG->dirroot.'/test/form.php');

// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$mform = new simplehtml_form();

// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    echo "You has clicked cancel button";
    
} else if ($fromform = $mform->get_data()) {
   
    print_r($fromform);

} else {
   
    $mform->set_data($toform);

    // Display the form.
    $mform->display();
}


?>

<!DOCTYPE HTML>
<html>
<head>
<style>
  .ui-tabs-anchor {
    outline: none;
  }
</style>
<script>
window.onload = function() {
var options1 = {
	animationEnabled: true,
	title: {
		text: "Spline Chart using jQuery Plugin"
	},
	axisX: {
		labelFontSize: 14
	},
	axisY: {
		labelFontSize: 14
	},
	data: [{
		type: "spline", //change it to line, area, bar, pie, etc
		dataPoints: [
			{ y: 10 },
			{ y: 6 },
			{ y: 14 },
			{ y: 12 },
			{ y: 19 },
			{ y: 14 },
			{ y: 26 },
			{ y: 10 },
			{ y: 22 }
		]
	}]
};

var options2 = {
	title: {
		text: "Spline Area Chart using jQuery Plugin"
	},
	axisX: {
		labelFontSize: 14
	},
	axisY: {
		labelFontSize: 14
	},
	data: [{
		type: "splineArea", //change it to line, area, bar, pie, etc
		dataPoints: [
			{ y: 10 },
			{ y: 6 },
			{ y: 14 },
			{ y: 12 },
			{ y: 19 },
			{ y: 14 },
			{ y: 26 },
			{ y: 10 },
			{ y: 22 }
		]
	}]
};

$("#tabs").tabs({
	create: function (event, ui) {
		//Render Charts after tabs have been created.
		$("#chartContainer1").CanvasJSChart(options1);
		$("#chartContainer2").CanvasJSChart(options2);
	},
	activate: function (event, ui) {
		//Updates the chart to its container size if it has changed.
		ui.newPanel.children().first().CanvasJSChart().render();
	}
});

}
</script>
</head>
<body>
<div id="tabs" style="height: 360px">
<ul>
<li ><a href="#tabs-1" style="font-size: 12px">Spline</a></li>
<li ><a href="#tabs-2"  style="font-size: 12px">Spline Area</a></li>
</ul>
<div id="tabs-1" style="height: 300px">
<div id="chartContainer1" style="height: 300px; width: 100%;"></div>
</div>
<div id="tabs-2" style="height: 300px">
<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
</div>
</div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
</body>
</html>
<?php
  
  echo $OUTPUT->footer();

  ?>