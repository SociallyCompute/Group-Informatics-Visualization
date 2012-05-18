<body>
<!--d3 repositories for generating graphs -->
<script type="text/javascript" src="http://mbostock.github.com/d3/d3.js?2.1.3"></script>
<script type="text/javascript" src="http://mbostock.github.com/d3/d3.geom.js?2.1.3"></script>
<script type="text/javascript" src="http://mbostock.github.com/d3/d3.layout.js?2.1.3"></script>

<script
= "text/javascript">
// define the data for the chart
// I use {name , value}
var data = <?php echo json_encode($data); ?>;


// display height and width
var height = 500;
var width = 1200;

// display margins (top,bot,left,right)
// top left corner = 0,0
// bot right corner = height,width
var top_margin = 20;
var bot_margin = 70;
var left_margin = 200;
var right_margin = 100;


// chart corners
var top_left = {"x":left_margin, "y":top_margin};
var top_right = {"x":width - right_margin, "y":top_margin};
var bot_left = {"x":left_margin, "y":height - bot_margin};
var bot_right = {"x":width - right_margin, "y":height - bot_margin};

// max value from the data(x and y if scatter)
var max = 0;
var x, i;
for (x = 0; x < data.length x++) {
    for (i = 0; i < data[x].length; i++) {
        if (data[x][i]['counter'] > max) {
            max = data[x][i]['counter'];
        }
    }
}

var data_max = max * 1.1;

// number of graph ticks(x and y if scatter, or one for both)
var x_ticks = data[0].length
var y_ticks = 8;

//data scales on x and y
// linear scale for domain of values(min and max)
// on range of (left_bot,right_bot) or (top_left,top_right)
//-------------
// ordinal scale for a length of data on a range
// on range of (left_bot,right_bot) or (top_left,top_right)
var x = d3.scale.ordinal()
    .domain(d3.range(data[0].length))
    .rangeBands([left_margin, width - right_margin]);
var y = d3.scale.linear()
    .domain([0, data_max])
    .range([height - bot_margin, top_margin)
]),

// define the svg element to hold the chart
var vis = d3.select("body")
    .append("svg:svg")
    .attr("width", w)
    .attr("height", h)
    .append("svg:g")
    .attr("id", "barchart")
    .attr("class", "barchart")


// define graph ticks
// class= "ticks"
var rules = vis.selectAll("g.rule")
    .data(x.ticks(num_ticks))
    .enter()
    .append("svg:g")
    .attr("transform", function (d) {
        return "translate(" + (chart_left + x(d)) + ")";
    });
rules.append("svg:line")
    .attr("class", "tick")
    .attr("y1", chart_top)
    .attr("y2", chart_top + 4)
    .attr("stroke", "black");

rules.append("svg:text")
    .attr("class", "tick_label")
    .attr("text-anchor", "middle")
    .attr("y", chart_top)
    .text(function (d) {
        return d;
    });
var bbox = vis.selectAll(".tick_label").node().getBBox();
vis.selectAll(".tick_label")
    .attr("transform", function (d) {
        return "translate(0," + (bbox.height) + ")";
    });

// define the graph axes
// class = "axes"

// define the bars / line (chart objects)
// class = "bars"/"line"/(whatever type of data structure)


//define axes values and data values
// class = "axes"
vis.append("svg:line")
    .attr("class", "axes")
    .attr("x1", chart_left)
    .attr("x2", chart_left)
    .attr("y1", chart_bottom)
    .attr("y2", chart_top)
    .attr("stroke", "black");
vis.append("svg:line")
    .attr("class", "axes")
    .attr("x1", chart_left)
    .attr("x2", chart_right)
    .attr("y1", chart_top)
    .attr("y2", chart_top)
    .attr("stroke", "black");


</script>

</body>





