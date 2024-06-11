// var userManagement = document.getElementById("userManagement");
// let userStore = JSON.parse(sessionStorage.getItem("IS_VALID"));
// if (userStore.role_name === "admin") {
//   userManagement.style.display = "block";
// } else {
//   userManagement.style.display = "none";
// }
function bindChartDataName(jsonData) {
  $("#Totaltechusagebyname").text(jsonData.length);
  // console.log(jsonData);

  jsonData.forEach(function (item) {
    item.y = Number(item.y);
  });
  Highcharts.chart("chartContainer", {
    chart: {
      type: "column",
    },
    legend: {
      itemStyle: {
        fontsize:"14px",
       // fontWeight: '600',
          fontFamily: 'Nunito, sans-serif'
      }
  },

    plotOptions: {
      column: {
        //color: '#047acf',Nunito", sans-serif
        //color:'#98bdff',
        color: "#4b49ac",
      },
      
    },
    credits: {
      enabled: true,
    },

    title: {
      text: "",
    },
    xAxis: {
      type: "category",
      // title: {
      //   text: "Total Usage",
      //   style: {
      //     fontSize: "18px",
      //       fontFamily: '"Nunito", sans-serif'
      //   }
      // },
      labels: {
        rotation: -45,
        style: {
         // fontWeight: '600',
          fontSize: "14px",
          fontFamily:'"Nunito", sans-serif',
        },
      },
    },
    yAxis: {
      title: {
        text: "Total Usage",
        style: {
         // fontWeight: '600',
          fontSize: "14px",
            fontFamily: '"Nunito", sans-serif'
        }
      },
      labels: {
        style: {
          // fontWeight: '600',
          fontSize: "14px",
            fontFamily: '"Nunito", sans-serif'
        }
    }
    },
    series: [
      {
        name: "Total Usage",
        // colorByPoint: true,
        data: jsonData,
        
      },
    ],
  });
}

function bindChartDataByDate(jsonData) {
  $("#Totaltechusagebydate").text(jsonData.length);
  jsonData.forEach(function (item) {
    item.y = Number(item.y);
  });
  var data = jsonData;
  var groupedData = {};
  data.forEach(function (item) {
    var date = item.date;
    if (!groupedData[date]) {
      groupedData[date] = 0;
    }
    groupedData[date] += item.y;
  });
  // Prepare data for Highcharts
  var chartData = [];
  Object.keys(groupedData).forEach(function (date) {
    chartData.push({
      name: date,
      y: groupedData[date],
    });
  });
  Highcharts.chart("chartContainer1", {
    chart: {
      type: "column",
    },
    legend: {
      itemStyle: {
        fontsize:"14px",
        //fontWeight: '600',
          fontFamily: 'Nunito, sans-serif'
      }
  },
    plotOptions: {
      column: {
        // color: '#047acf' // Set your desired color here
        //color: '#047acf',
        //color:'#98bdff',
        color: "#4b49ac",
      },
    },
    credits: {
      enabled: false,
    },
    title: {
      text: "",
    },
    xAxis: {
      categories: Object.keys(groupedData), // Dates
      labels: {
        rotation: -45,
        style: {
          fontSize: "14px",
          //fontWeight: '600',
          fontFamily:'"Nunito", sans-serif',
        },
      },
    },
    yAxis: {
      title: {
        text: "Usage Value",
        style: {
          fontSize: "14px",
          //fontWeight: '600',
            fontFamily: '"Nunito", sans-serif'
        }
      },
      labels: {
        style: {
          fontSize: "14px",
         // fontWeight: '600',
            fontFamily: '"Nunito", sans-serif'
        }
    }
    },
    series: [
      {
        name: "Usage By Date",
        data: chartData, // Usage values
      },
    ],
  });
}

function bindTableByNameAndDate(jsonDate) {
  // console.log("table function",jsonDate);
  var data = jsonDate;
  var dataTable = $("#example").DataTable({
    data: data,
  "lengthMenu": [ [5, 10, 20, 100], [5, 10, 20, 100] ],
 
    // bDestroy: true,
    // paging: true,
    // lengthChange: false,
    //searching: false,
    // info: true,
    // autoWidth: false,
    // responsive: true,
    //order: [[1, "asc"]],
    //ordering: true,
    columns: [
      {
        data: "date",
      },
      {
        data: "techNames",
      },
      {
        data: "totalUsage",
      },
    ],
  });

  dataTable.clear().draw();
  dataTable.rows.add(jsonDate).draw();
}

function ajaxCall(startDate, endDate) {
  $("#overlay").fadeIn(300);　
  $.ajax({
    url: `${apiUrl}/kpi_data.php?p_DataRequest=TechUsage_ByName&p_startDate=${startDate}&p_endDate=${endDate}`, // PHP file to send the request
    type: "GET",
    success: function (res) {
      bindChartDataName(res.data);
    },
    error: function (xhr, status, error) {
      console.error(error); // Log any errors to the console
    },
  });
  $.ajax({
    url: `${apiUrl}/kpi_data.php?p_DataRequest=TechUsage_ByDate&p_startDate=${startDate}&p_endDate=${endDate}`, // PHP file to send the request
    type: "GET",
    success: function (res) {
      bindChartDataByDate(res.data);
    },
    error: function (xhr, status, error) {
      console.error(error); // Log any errors to the console
    },
  });

  $.ajax({
    url: `${apiUrl}/kpi_data.php?p_DataRequest=TechUsage_ByNameAndDate&p_startDate=${startDate}&p_endDate=${endDate}`, // PHP file to send the request
    type: "GET",
    success: function (res) {
      // console.log("table",res.data);
      bindTableByNameAndDate(res.data);
    },
    error: function (xhr, status, error) {
      console.error(error); // Log any errors to the console
    },
  }).done(function() {
    setTimeout(function(){
      $("#overlay").fadeOut(300);
    },500);
  });
}
function checkAuthrization() {
  console.log("index");
  let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
  // let userName = decryptedData;
  if (userName === null) {
    window.location.href = "http://localhost/skydash/login.php";
  }
}

function getAllUsers() {
  $.ajax({
    type: "GET",
    url: `${apiUrl}/manageuser.php`,
    success: function (response) {
      var usersnumber = response.data.length;
      $("#Totalusers").text(usersnumber);
      //console.log("response users", response.data.length);
    },
  });
}

$(document).ready(function () {
  console.log("document ready");
  checkAuthrization();

  getAllUsers();

  var startDate = "";
  var endDate = "";

  $("#daterange").daterangepicker({
    timePicker: true,
    startDate: moment().subtract(7, "days").format("YYYY-MM-DD"),
    endDate: moment().format("YYYY-MM-DD"),
    locale: {
      format: "YYYY-MM-DD",
    },
  });

  $("#daterange").on("apply.daterangepicker", function (ev, picker) {
    // console.log("picker",picker.startDate.format("YYYY-MM-DD"));
    // console.log(picker.endDate.format("YYYY-MM-DD"));
  });

  $("#filterForm").click(function () {
    startDate = $("#daterange")
      .data("daterangepicker")
      .endDate.format("YYYY-MM-DD");
    endDate = $("#daterange")
      .data("daterangepicker")
      .startDate.format("YYYY-MM-DD");
    //console.log("filterForm",startDate,endDate);
    ajaxCall(startDate, endDate);
  });

  $("#resetForm").click(function (event) {
    $("#daterange")
      .data("daterangepicker")
      .setStartDate(moment().subtract(7, "days").format("YYYY-MM-DD"));
    $("#daterange")
      .data("daterangepicker")
      .setEndDate(moment().format("YYYY-MM-DD"));
    startDate = moment().format("YYYY-MM-DD");
    endDate = moment().subtract(7, "days").format("YYYY-MM-DD");
    ajaxCall(startDate, endDate);
  });
  (startDate = moment().format("YYYY-MM-DD")),
    (endDate = moment().subtract(7, "days").format("YYYY-MM-DD")),
    ajaxCall(startDate, endDate);
});
