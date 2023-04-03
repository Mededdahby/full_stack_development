const article = document.querySelector('.article');
const aside = document.querySelector('aside');
const total = document.querySelector('.total');
const items = document.querySelector(".item");
const products = document.querySelector('.panel');
const container = document.querySelector('.container')

var sum = 0;
let tab = [];

var req = new XMLHttpRequest();
let url = "data.php";
req.open("GET", url, true);
req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        //UpdateList
        Update = () => {
            let el = document.createElement('div');
            el.setAttribute('class', 'item')
            let d = '';
            data.forEach(element => {
                d += `<div class='item'>
                <div  class="add" >
                <img src="imgs/plus.png" id="${element.id}" alt="">
                </div>
                <img src="imgs/${element.id}.png" alt="">
                <h2>${element.name} : ${element.price}</h2>
                </div>`;
                element.qqt++;
            });
            // total.textContent = `total: ${sum}`;
            container.innerHTML = d;
        }
        Update();
        //Add to carte{aside}
        function delProd(e) {
            id = e.target.getAttribute("id")
            total -= products[id - 1].qtt * products[id - 1].price
            products[id - 1].qtt = 0;
            AddToAside(e)
        }
        const add = document.querySelectorAll('.add');
        AddToAside = (e) => {
            let d = '';
            data.forEach(item => {
                if (item.id == e.target.id) {
                    item.qtt++;
                    d += `<div class="panel" id="${item.id}" date_add="${item.qtt}"> <img src="imgs/${item.id}.png" alt="">
                <h2>${item.name} : <h2 class="qtt">${item.qtt}</h2></h2>
                <div class="del">
                <img id="${item.id}" src="imgs/del.png" alt="">
                </div>
                </div>`;
                    tab.push(item.id);
                }
            })
            products.innerHTML += d;
            const del = document.querySelectorAll('.del');
            del.forEach(d => {
                if (d.id == e.target.id) {
                    addEventListener('click', delProd)
                }
            })
        }

        function addProd(e) {
            let test = 0;
            console.log(tab)
            const products = document.querySelectorAll('.panel');
            tab.forEach(t => {
                if (t == e.target.id)
                    test = 1;
                console.log(tab);
            })
            console.log(test)
            console.log(e.target.id)
            if (test == 0) {
                AddToAside(e);
                console.log("hello 2")
            }
            else {
                id = e.target.getAttribute("id")
                console.log(id)
                let qq = data[id - 1].qtt++;
                products.forEach(q => {
                    if (e.target.id == q.id) {
                        console.log(q);
                        const quantite = q.querySelector('.qtt');
                        console.log(quantite);
                        quantite.innerHTML = qq;
                    }
                }

                )

            }

        }
        add.forEach(ad =>
            ad.addEventListener('click', addProd));     
    }
}
req.send();


