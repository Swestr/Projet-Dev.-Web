var stonePosition;
var marque = [];

// Object coordinates
function coordinate(x, y)
{
    this.x = x;
    this.y = y;
}

// Track the mouse position
function getMousePosition(e)
{
    var posX = e.clientX;
    var posY = e.clientY;

    var mousePosition = new coordinate(posX, posY);

    return mousePosition;
}

// Draw a stone tracking the mouse cursor
function trackingStone(e, size)
{
    var svgNS = "http://www.w3.org/2000/svg";
    var svgDOM = document.getElementsByTagName("svg")[0];
    var stone = document.createElementNS(svgNS,"circle");
    var stonePos = getMousePosition(e);
    var bclient = document.getElementById("grid").getBoundingClientRect();

    // Translate the mouse coordinates from the client to the grid
    stonePos.x = Math.round(((stonePos.x - bclient.left) / ((svgDOM.getAttribute("width") * 10) / (size * 10 + 10))) * 10);
    stonePos.y = Math.round(((stonePos.y - bclient.top) / ((svgDOM.getAttribute("height") * 10) / (size * 10 + 10))) * 10);

    fitGrid(stone, stonePos, size);
}

// Adapt the position of the stone to the grid
function fitGrid(stone, stonePos, size)
{
	if((stonePos.x % 10) < 5)	stonePos.x = stonePos.x - (stonePos.x % 10);
	if((stonePos.x % 10) >= 5)	stonePos.x = stonePos.x + (10 - (stonePos.x % 10));

	if((stonePos.y % 10) < 5)	stonePos.y = stonePos.y - (stonePos.y % 10);
	if((stonePos.y % 10) >= 5)	stonePos.y = stonePos.y + (10 - (stonePos.y % 10));

	// Attributes of the stone
	stone.setAttribute("id", "stone");
    stone.setAttribute("r", 3);
    stone.setAttribute("stroke", "black");
    stone.setAttribute("stroke-width", 0.5);
    stone.setAttribute("stroke-opacity", 0.5);
    stone.setAttribute("fill", "black");
    stone.setAttribute("fill-opacity", 0.5);

    // Create the stone or update its position
    if((stonePos.x >= 0) && (stonePos.x <= (size * 10 - 10)) && (stonePos.y >= 0) && (stonePos.y <= (size * 10 - 10)))
    {
    	if(document.getElementById(getLabels(stonePos)) == null)
    	{
    		if(document.getElementById("stone") == null)
		    {
		       	document.getElementById("goban").appendChild(stone);
		       	document.getElementById("stone").onclick = placeStone;
		    }
		    else
		    {
		    	document.getElementById("stone").setAttribute("cx", stonePos.x);
		    	document.getElementById("stone").setAttribute("cy", stonePos.y);
		    }
		    stonePosition = new coordinate(stonePos.x, stonePos.y);
    	}
    }
}

// Place a stone on the goban
function placeStone()
{
	var svgNS = "http://www.w3.org/2000/svg";
    var svgDOM = document.getElementsByTagName("svg")[0];
    var stone = document.createElementNS(svgNS,"circle");
    var id = getLabels(stonePosition);
    // Attributes of the stone
    stone.setAttribute("id", id);
    stone.setAttribute("r", 3);
    stone.setAttribute("stroke", "black");
    stone.setAttribute("stroke-width", 0.5);
    stone.setAttribute("fill", "black");
    stone.setAttribute("fill-opacity", 1);
    stone.setAttribute("cx", stonePosition.x);
    stone.setAttribute("cy", stonePosition.y);

    document.getElementById("goban").appendChild(stone);
    checkSides(id);
}

// Convert coordinates with the corresponding labels
function getLabels(position)
{
	// Get the position on X axe
	if (position.x > 0) var coordX = String.fromCharCode((position.x / 10) + 65);
	else var coordX = String.fromCharCode(65);

	// Get the position on Y axe
	var coordY = (position.y + 10) / 10;

	var coord = coordX + coordY;

	return coord;
}

// Convert labels with the corresponding coordinates
function getPosition(labels)
{
	// Get the coordinate on X axe
	var coordX = labels.match(/[A-Z]+/g);
  coordX = coordX[0];
	var posX = coordX.charCodeAt(0) - 65;
	if (posX > 0) posX *= 10;
	else posX = 0;

	// Get the coordinate on Y axe
	var coordY = labels.match(/\d+/g);
	var posY = (coordY * 10) - 10;

	var position = new coordinate(posX, posY);

	return position;
}
function checkSides(id)
{
  var color = document.getElementById(id).getAttribute("fill");
  var position = getPosition(id);
  var x = position.x;
  var y = position.y;
  var dir = [];
  dir.push(document.getElementById(getLabels(new coordinate(x, y - 10))));
  dir.push(document.getElementById(getLabels(new coordinate(x, y + 10))));
  dir.push(document.getElementById(getLabels(new coordinate(x - 10, y))));
  dir.push(document.getElementById(getLabels(new coordinate(x + 10, y))));

  dir.forEach(function(elem)
  {
    if (elem !== null)
    {
      if (elem.getAttribute("fill") != color)
      {
        if (isCaptured(elem.getAttribute("id")))
          marque.forEach(function(m) { document.getElementById("goban").removeChild(document.getElementById(m)); });
      }
    }
    marque = [];
    n = 0;
  });
}
function isCaptured(id)
{
  var color = document.getElementById(id).getAttribute("fill");
  var position = getPosition(id);
  var x = position.x;
  var y = position.y;
  var dir = [];
  dir.push(document.getElementById(getLabels(new coordinate(x, y - 10))));
  dir.push(document.getElementById(getLabels(new coordinate(x, y + 10))));
  dir.push(document.getElementById(getLabels(new coordinate(x - 10, y))));
  dir.push(document.getElementById(getLabels(new coordinate(x + 10, y))));
  var bool = true;

  if (!marque.includes(id))
    marque.push(id);
  dir.forEach(function(elem)
  {
    if (elem !== null)
    {
      if (elem.getAttribute("fill") == color && !marque.includes(elem.getAttribute("id")))
        bool = isCaptured(elem.getAttribute("id"));
    }
    else
      bool = false;
  });
  return bool;
}
