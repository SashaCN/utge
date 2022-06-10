window.onload = function (){
    let buttons = document.querySelectorAll("#editControls a"),
        editor = document.querySelector("#editor"),
        code = document.querySelector("#code")
    
    buttons.forEach(item => {
      item.onclick = function(e) {
        switch(this.getAttribute("data-role")) {
          case "h1":
          case "h2":
          case "h3":
          case "p":
            document.execCommand("formatBlock", false, this.getAttribute("data-role"))
            break
          case "switchEditor":
            if(getComputedStyle(code).display == "none"){
              code.style.display = "block"
              editor.style.display = "none"
              code.value = editor.innerHTML.trim()
            } else {
              code.style.display = "none"
              editor.style.display = "block"
              editor.innerHTML = code.value
            }
            break
          case "insertTable":
            let rows = prompt("How many rows?"),
                cells = prompt("How many cells?"),
                table = "<div class='adaptive-table'><table>",
                cellsCount
            while (rows != 0) {
              cellsCount = cells
              table += "<tr>"
              while (cellsCount != 0) {
                table += "<td>&nbsp;</td>"
                cellsCount--
              }
              table += "</tr>"
              rows--
            }
            table += "</table></div>"
            document.execCommand("insertHTML", false, table);
            break
          case "createlink":
          case "insertimage":
            let url = prompt('Enter the link here: ', 'http:\/\/');
            document.execCommand(this.getAttribute("data-role"), false, url);
            break
          default:
            document.execCommand(this.getAttribute("data-role"), false, null)
            break
        }
      }
    })
  }