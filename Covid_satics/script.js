// MOHAMED EDDABY ET MAHSOUNE ZAID

const countries = document.querySelector(".countries");
const count_info = document.querySelector(".chart");
const ctx = document.getElementById('myChart').getContext('2d');
const label_tittle = document.querySelector("label");
const clink = document.querySelector(".clink")

const data = {
  labels: '',
  datasets: [{
    label: 'Confirmed',
    backgroundColor: 'yellow',
    borderColor: 'yellow',
    data: [],
  },
  {
    label: 'Recovered',
    backgroundColor: 'green',
    borderColor: 'green',
    data: [],
  },
  {
    label: 'Deaths',
    backgroundColor: 'red',
    borderColor: 'red',
    data: [],
  }
  ]
};

const config = {
  type: 'line',
  data: data,
  options: {}
};
const myChart = new Chart(
  ctx,
  config
);



const fn = function (e) {
  const req_data = new XMLHttpRequest();
  req_data.open("GET", `https://api.covid19api.com/dayone/country/${e.target.id}`, true);
  req_data.onreadystatechange = () => {
    if (req_data.readyState == 4 && req_data.status == 200) {
      let d_country = JSON.parse(req_data.response);
      let data_country = d_country.sort((a, b) => a.Country < b.Country ? -1 : 1);
      //count_info.textContent=data_country[900].Confirmed;
      let data_c = data_country.map(e => e.Confirmed);
      let data_r = data_country.map(e => e.Recovered);
      let data_d = data_country.map(e => e.Deaths);
      let i = 0;
      label_tittle.textContent = data_country[0].Country;
      let label = data_country.map((e, i) => i);
      myChart.data.labels = label;
      myChart.data.datasets[0].data = data_c;
      myChart.data.datasets[1].data = data_r;
      myChart.data.datasets[2].data = data_d;
      myChart.update()
    }
  }
  req_data.send();
}
const req = new XMLHttpRequest();
req.open("Get", "https://api.covid19api.com/countries", true);
req.onreadystatechange = () => {
  if (req.readyState == 4 && req.status == 200) {
    let country = JSON.parse(req.response);
    country.forEach(element => {
      let div = document.createElement("div");
      let txt = document.createTextNode(`${element.Country}`);
      div.setAttribute("id", `${element.ISO2}`);
      div.setAttribute("class", "clink");
      div.appendChild(txt);
      countries.appendChild(div);
      div.addEventListener("click", fn);

    });
  }
}
req.send();





