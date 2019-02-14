if (document.URL.includes('pages/edit')) {
    var btnCreateArea = document.getElementById("btnCreateArea");
    var btnModifArea = document.getElementById("btnModifArea");
    var showModalArea = document.getElementById("showModalArea");
    var bool = false;
    var page = document.getElementById('page');

    // Get to know how many areas there is on the board with localStorage property: idLocal
    if (localStorage.getItem('idLocal')) {
        var idLocal = localStorage.getItem('idLocal');
        console.log(`number of area(s) in local storage: ${idLocal}`);
    } else {
        localStorage.setItem('idLocal', 0);
        var idLocal = localStorage.getItem('idLocal');
        console.log(`number of area(s) in local storage: ${idLocal}`);
    }

    // display valid canvas after actualisation
    for (var i = 1; i <= idLocal; i++) {

        let area = document.createElement("canvas");
        area.setAttribute("id", "area" + i);
        area.setAttribute("class", "areaCreated");
        area.setAttribute("width", localStorage.getItem('width' + i));
        area.setAttribute("height", localStorage.getItem('height' + i));
        area.style.left = localStorage.getItem('left' + i);
        area.style.top = localStorage.getItem('top' + i);
       
        page.appendChild(area);
        console.log(area);
    }

    // Create a canvas tag
    // When clicking on the pages/edit button "Créer une zone"
    var CreateArea = btnCreateArea.addEventListener("click", function CreateArea() {
        if (this.click) {
            // Open Create's modal window
            page.style.cursor = "crosshair";
            showModalArea.style.display = "block";
            btnCreateArea.className += " select";
            btnModifArea.classList.remove("select");
            bool = true;
            console.log(`Création d'une zone: bool est ${bool}`);

            // if (document.URL.includes('pages/edit') || (document.URL.includes('mapping'))) {
            // If the button was clicked
            // if (bool) {

            // Reset coords
            var xa = 0;
            var ya = 0;

            function get2FirtsCoords(event) {
                event.preventDefault();
                xa = event.layerX;
                ya = event.layerY;
                // If the button was clicked
                // if (bool) {
                page.addEventListener('mousemove', get2LastCoords);
                bool = false;
                // }
            }

            function get2LastCoords(event) {
                var xb = event.layerX;
                var yb = event.layerY;
                // console.log(`\nxa: ${xa}, ya: ${ya}, xb: ${xb}, yb: ${yb}`);

                assignCoordsAndAttributeCanvas(xa, ya, xb, yb);
            }

            // Zone creation function
            function assignCoordsAndAttributeCanvas(xA, yA, xB, yB) {

                //As we draw an area, remove each outdated area
                let areaUpdated = document.getElementById('area');

                if (areaUpdated) {
                    page.removeChild(areaUpdated);
                }
                // console.log(old);

                console.log(`\nxA: ${xA} || yA: ${yA} || xB: ${xB} || yB: ${yB}\n`);

                let area = document.createElement("canvas");
                area.setAttribute("id", "area");
                area.setAttribute("class", "areaValidated");
                area.setAttribute("width", Math.abs(xB - xA));
                area.setAttribute("height", Math.abs(yB - yA));

                if (xA < xB && yA > yB) {
                    area.style.left = xA + "px";
                    area.style.top = yB + "px";
                } else if (xA > xB && yA > yB) {
                    area.style.left = xB + "px";
                    area.style.top = yB + "px";
                } else if (xA > xB && yA < yB) {
                    area.style.left = xB + "px";
                    area.style.top = yA + "px";
                } else {
                    area.style.left = xA + "px";
                    area.style.top = yA + "px";
                }

                // We append the zone in the board
                page.appendChild(area);
            }

            // Removing EventListener 
            function remove(event) {
                page.removeEventListener('mousemove', get2LastCoords);
                page.removeEventListener('mousedown', get2FirtsCoords);
                var confirmer = confirm("Etes vous sur de vouloir utiliser cette zone ?");

                if (confirmer) {
                    idLocal++;
                    page.removeEventListener('mouseup', remove);
                    var posLeft = document.getElementById("area").style.left;
                    var posTop = document.getElementById("area").style.top;
                    var width = document.getElementById("area").width;
                    var height = document.getElementById("area").height;
                    localStorage.setItem('left' + idLocal, posLeft);
                    localStorage.setItem('top' + idLocal, posTop);
                    localStorage.setItem('width' + idLocal, width + 'px');
                    localStorage.setItem('height' + idLocal, height + 'px');
                    localStorage.setItem('idLocal', idLocal);
                    document.getElementById("area").id = "area" + idLocal;
                    page.style.cursor = "initial";
                } else {
                    page.removeEventListener('mouseup', remove);
                    page.removeChild(document.getElementById("area"));
                    page.style.cursor = "initial";
                }
            }

            page.addEventListener('mousedown', get2FirtsCoords);
            page.addEventListener('mouseup', remove);
        } else {
            showModalArea.style.display = "none";
        }
    });

    // When clicking on the pages/edit button "Modifier une zone"
    var ModifArea = btnModifArea.addEventListener("click", function ModifArea() {
        if (this.click) {
            page.style.cursor = "initial";
            bool = false;
            console.log(`Modification d'une zone: bool est ${bool}`);
            showModalArea.style.display = "block";
            btnCreateArea.classList.remove("select");
            btnModifArea.className += " select";
        } else {
            showModalArea.style.display = "none";
        }
    });

    const submit = document.getElementById("inputSubmit");
    var reloadPage = submit.addEventListener("click", function () {
        location.reload();
    })
}