<script>

let ctx = document.getElementById("myChart").getContext("2d");
    let myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor ?>, <?php echo $kedah ?>, <?php echo $kelantan ?>, <?php echo $melaka ?>, <?php echo $sembilan ?>, 
                    <?php echo $pahang ?>, <?php echo $penang ?>, <?php echo $perak ?>, <?php echo $perlis ?>, <?php echo $sabah ?>, 
                    <?php echo $sarawak ?>, <?php echo $selangor ?>, <?php echo $terengganu ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx2 = document.getElementById("myChart2").getContext("2d");
    let myChart2 = new Chart(ctx2, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor ?>, <?php echo $kedah ?>, <?php echo $kelantan ?>, <?php echo $melaka ?>, <?php echo $sembilan ?>, 
                    <?php echo $pahang ?>, <?php echo $penang ?>, <?php echo $perak ?>, <?php echo $perlis ?>, <?php echo $sabah ?>, 
                    <?php echo $sarawak ?>, <?php echo $selangor ?>, <?php echo $terengganu ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx3 = document.getElementById("myChart3").getContext("2d");
    let myChart3 = new Chart(ctx3, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor ?>, <?php echo $kedah ?>, <?php echo $kelantan ?>, <?php echo $melaka ?>, <?php echo $sembilan ?>, 
                    <?php echo $pahang ?>, <?php echo $penang ?>, <?php echo $perak ?>, <?php echo $perlis ?>, <?php echo $sabah ?>, 
                    <?php echo $sarawak ?>, <?php echo $selangor ?>, <?php echo $terengganu ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx4 = document.getElementById("myChart4").getContext("2d");
    let myChart4 = new Chart(ctx4, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor4 ?>, <?php echo $kedah4 ?>, <?php echo $kelantan4 ?>, <?php echo $melaka4 ?>, <?php echo $sembilan4 ?>, 
                    <?php echo $pahang4 ?>, <?php echo $penang4 ?>, <?php echo $perak4 ?>, <?php echo $perlis4 ?>, <?php echo $sabah4 ?>, 
                    <?php echo $sarawak4 ?>, <?php echo $selangor4 ?>, <?php echo $terengganu4 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx5 = document.getElementById("myChart5").getContext("2d");
    let myChart5 = new Chart(ctx5, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor5 ?>, <?php echo $kedah5 ?>, <?php echo $kelantan5 ?>, <?php echo $melaka5 ?>, <?php echo $sembilan5 ?>, 
                    <?php echo $pahang5 ?>, <?php echo $penang5 ?>, <?php echo $perak5 ?>, <?php echo $perlis5 ?>, <?php echo $sabah5 ?>, 
                    <?php echo $sarawak5 ?>, <?php echo $selangor5 ?>, <?php echo $terengganu5 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx6 = document.getElementById("myChart6").getContext("2d");
    let myChart6 = new Chart(ctx6, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor6 ?>, <?php echo $kedah6 ?>, <?php echo $kelantan6 ?>, <?php echo $melaka6 ?>, <?php echo $sembilan6 ?>, 
                    <?php echo $pahang6 ?>, <?php echo $penang6 ?>, <?php echo $perak6 ?>, <?php echo $perlis6 ?>, <?php echo $sabah6 ?>, 
                    <?php echo $sarawak6 ?>, <?php echo $selangor6 ?>, <?php echo $terengganu6 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx7 = document.getElementById("myChart7").getContext("2d");
    let myChart7 = new Chart(ctx7, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor7 ?>, <?php echo $kedah7 ?>, <?php echo $kelantan7 ?>, <?php echo $melaka7 ?>, <?php echo $sembilan7 ?>, 
                    <?php echo $pahang7 ?>, <?php echo $penang7 ?>, <?php echo $perak7 ?>, <?php echo $perlis7 ?>, <?php echo $sabah7 ?>, 
                    <?php echo $sarawak7 ?>, <?php echo $selangor7 ?>, <?php echo $terengganu7 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx8 = document.getElementById("myChart8").getContext("2d");
    let myChart8 = new Chart(ctx8, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor8 ?>, <?php echo $kedah8 ?>, <?php echo $kelantan8 ?>, <?php echo $melaka8 ?>, <?php echo $sembilan8 ?>, 
                    <?php echo $pahang8 ?>, <?php echo $penang8 ?>, <?php echo $perak8 ?>, <?php echo $perlis8 ?>, <?php echo $sabah8 ?>, 
                    <?php echo $sarawak8 ?>, <?php echo $selangor8 ?>, <?php echo $terengganu8 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx9 = document.getElementById("myChart9").getContext("2d");
    let myChart9 = new Chart(ctx9, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor9 ?>, <?php echo $kedah9 ?>, <?php echo $kelantan9 ?>, <?php echo $melaka9 ?>, <?php echo $sembilan9 ?>, 
                    <?php echo $pahang9 ?>, <?php echo $penang9 ?>, <?php echo $perak9 ?>, <?php echo $perlis9 ?>, <?php echo $sabah9 ?>, 
                    <?php echo $sarawak9 ?>, <?php echo $selangor9 ?>, <?php echo $terengganu9 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx10 = document.getElementById("myChart10").getContext("2d");
    let myChart10 = new Chart(ctx10, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor10 ?>, <?php echo $kedah10 ?>, <?php echo $kelantan10 ?>, <?php echo $melaka10 ?>, <?php echo $sembilan10 ?>, 
                    <?php echo $pahang10 ?>, <?php echo $penang10 ?>, <?php echo $perak10 ?>, <?php echo $perlis10 ?>, <?php echo $sabah10 ?>, 
                    <?php echo $sarawak10 ?>, <?php echo $selangor10 ?>, <?php echo $terengganu10 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx11 = document.getElementById("myChart11").getContext("2d");
    let myChart11 = new Chart(ctx11, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor11 ?>, <?php echo $kedah11 ?>, <?php echo $kelantan11 ?>, <?php echo $melaka11 ?>, <?php echo $sembilan11 ?>, 
                    <?php echo $pahang11 ?>, <?php echo $penang11 ?>, <?php echo $perak11 ?>, <?php echo $perlis11 ?>, <?php echo $sabah11 ?>, 
                    <?php echo $sarawak11 ?>, <?php echo $selangor11 ?>, <?php echo $terengganu11 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });

    let ctx12 = document.getElementById("myChart12").getContext("2d");
    let myChart12 = new Chart(ctx12, {
        type: "line",
        data: {
            labels: [
                "Johor",
                "Kedah",
                "Kelantan",
                "Melaka",
                "N.Sembilan",
                "Pahang",
                "Penang",
                "Perak",
                "Perlis",
                "Sabah",
                "Sarawak",
                "Selangor",
                "Terengganu",
            ],
            datasets: [
                {
                    label: "Students",
                    data: [<?php echo $johor12 ?>, <?php echo $kedah12 ?>, <?php echo $kelantan12 ?>, <?php echo $melaka12 ?>, <?php echo $sembilan12 ?>, 
                    <?php echo $pahang12 ?>, <?php echo $penang12 ?>, <?php echo $perak12 ?>, <?php echo $perlis12 ?>, <?php echo $sabah12 ?>, 
                    <?php echo $sarawak12 ?>, <?php echo $selangor12 ?>, <?php echo $terengganu12 ?>],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
             
            ],
        },
    });
 
    $("#tabs").tabs({
	create: function (event, ui) {
		//Render Charts after tabs have been created.
		$("#myChart").CanvasJSChart(myChart);
		$("#myChart2").CanvasJSChart(myChart2);
        $("#myChart3").CanvasJSChart(myChart3);
		$("#myChart4").CanvasJSChart(myChart4);

	},
	activate: function (event, ui) {
		//Updates the chart to its container size if it has changed.
		ui.newPanel.children().first().CanvasJSChart().render();
	}
});


</script>