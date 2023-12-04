const sideMenu = document.querySelector("aside");
const inputs = document.querySelectorAll(".input-field");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggle = document.querySelector(".theme-toggle");
const showhide = document.getElementById("showhide");
let savedTheme = "";
let data;
let orderData;
let clientData;

fetchTheme();

inputs.forEach((inp) => {
    inp.addEventListener("focus", () => {
      inp.classList.add("active");
    });
    inp.addEventListener("blur", () => {
      if (inp.value != "") return;
      inp.classList.remove("active");
    });
  });

async function fetchData(link) {
  const response = await fetch(link);
  let clientFetchData = await response.json();
  return clientFetchData;
}

menuBtn.addEventListener("click", () => {
  sideMenu.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  sideMenu.style.display = "none";
});

function fetchTheme() {
  fetchData("http://localhost:8080/getTheme/")
    .then((clientFetchData) => {
      savedTheme = clientFetchData.theme;
      applyTheme();
    })
    .catch((error) => {
      console.error("Error fetching theme:", error);
    });
}

function applyTheme() {
  if (savedTheme === "Dark") {
    document.body.classList.add("dark-theme-variables");
    themeToggle.querySelector("span:nth-child(1)").classList.remove("active");
    themeToggle.querySelector("span:nth-child(2)").classList.add("active");
  } else {
    document.body.classList.remove("dark-theme-variables");
    themeToggle.querySelector("span:nth-child(1)").classList.add("active");
    themeToggle.querySelector("span:nth-child(2)").classList.remove("active");
  }
}

themeToggle.addEventListener("click", () => {
  toggleTheme();
});

function toggleTheme() {
  if (savedTheme === "Light") {
    savedTheme = "Dark";
  } else {
    savedTheme = "Light";
  }
  applyTheme();
  setTheme(savedTheme);
}

async function setTheme(theme) {
  const response = await postTheme(theme);

  if (response.ok) {
    console.log("Theme updated successfully");
  } else {
    console.error("Failed to update theme");
  }
}

async function postTheme(theme) {
  return await fetch(`http://localhost:8080/setTheme/${theme}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
  });
}

showhide.addEventListener("click", () => {
  if (showhide.textContent === "Show All") {
    showhide.textContent = "Hide";
    refreshTable(data.length);
  } else {
    showhide.textContent = "Show All";
    refreshTable(6);
  }
});

function refreshTable(maxRows) {
  const tableBody = document.querySelector(".order table tbody");
  tableBody.innerHTML = "";

  if (!data || data.length === 0) {
    const noDataRow = document.createElement("tr");
    const noDataContent = `
            <td colspan="5" style="text-align: center;">No Data</td>
        `;
    noDataRow.innerHTML = noDataContent;
    tableBody.appendChild(noDataRow);
    return;
  }

  const startIndex = data.length - 1;
  for (let i = startIndex; i > startIndex - maxRows; i--) {
    if (i < 0) break;
    const order = data[i];
    const tr = document.createElement("tr");
    const trContent = `
            <td>${order.project_name}</td>
            <td>${order.project_id}</td>
            <td class="${
              order.payment_status === "Unpaid"
                ? "danger"
                : order.payment_status === "Cancel"
                ? "danger"
                : "success"
            }" style="font-weight: bold;">${order.payment_status}</td>
            <td class="${
              order.project_status === "Queue"
                ? "text_muted"
                : order.project_status === "Ongoing"
                ? "warning"
                : order.project_status === "Cancel"
                ? "danger"
                : "success"
            }" style="font-weight: bold;">${order.project_status}</td>
            <td class="details">Details</td>
        `;

    tr.innerHTML = trContent;
    tableBody.appendChild(tr);
  }
}

function orderTable(maxRows) {
  const tableBody = document.querySelector(".orderss table tbody");
  tableBody.innerHTML = "";

  if (!orderData || orderData.length === 0) {
    const noDataRow = document.createElement("tr");
    const noDataContent = `
            <td colspan="5" style="text-align: center;">No Data</td>
        `;
    noDataRow.innerHTML = noDataContent;
    tableBody.appendChild(noDataRow);
    return;
  }

  const startIndex = orderData.length - 1;
  for (let i = startIndex; i > startIndex - maxRows; i--) {
    if (i < 0) break;
    const orders = orderData[i];
    const tr = document.createElement("tr");
    const trContent = `
        <td>${orders.project_name}</td>
        <td>${orders.project_id}</td>
        <td class="${
          orders.payment_status === "Unpaid"
            ? "danger"
            : orders.payment_status === "Cancel"
            ? "danger"
            : "success"
        }" style="font-weight: bold;">${orders.payment_status}</td>
        <td class="${
          orders.project_status === "Queue"
            ? "text_muted"
            : orders.project_status === "Ongoing"
            ? "warning"
            : orders.project_status === "Cancel"
            ? "danger"
            : "success"
        }" style="font-weight: bold;">${orders.project_status}</td>
        <td>
            ${
              orders.payment_status === "Paid" &&
              orders.project_status != "Finished" &&
              orders.project_status != "Ongoing"
                ? `<button class="ongoing-button button-35">Ongoing</button>`
                : ""
            }
            ${
              orders.payment_status === "Paid" &&
              orders.project_status === "Ongoing" &&
              orders.project_status != "Finished" &&
              orders.project_status != "Queue"
                ? `<button class="finish-button button-35">Finished</button>`
                : ""
            }

        </td>
    `;

    tr.innerHTML = trContent;
    tableBody.appendChild(tr);
  }
}

function clientTable(maxRows) {
  const clientTableBody = document.querySelector(".client table tbody");
  clientTableBody.innerHTML = "";

  if (!clientData || clientData.length === 0) {
    const noDataRow = document.createElement("tr");
    const noDataContent = `
            <td colspan="5" style="text-align: center;">No Data</td>
        `;
    noDataRow.innerHTML = noDataContent;
    clientTableBody.appendChild(noDataRow);
    return;
  }

  const startIndex = clientData.length - 1;
  for (let i = startIndex; i > startIndex - maxRows; i--) {
    if (i < 0) break;
    const client = clientData[i];
    const tr = document.createElement("tr");
    const trContent = `
            <td>${client.name}</td>
            <td>${client.project_name}</td>
        `;

    tr.innerHTML = trContent;
    clientTableBody.appendChild(tr);
  }
}

function devTable(maxRows) {
  const devTableBody = document.querySelector(".managedev table tbody");
  devTableBody.innerHTML = "";

  if (!devData || devData.length === 0) {
    const noDataRow = document.createElement("tr");
    const noDataContent = `
            <td colspan="5" style="text-align: center;">No Data</td>
        `;
    noDataRow.innerHTML = noDataContent;
    devTableBody.appendChild(noDataRow);
    return;
  }

  const startIndex = devData.length - 1;
  for (let i = startIndex; i > startIndex - maxRows; i--) {
    if (i < 0) break;
    const dev = devData[i];
    const tr = document.createElement("tr");
    const trContent = `
            <td>${dev.id}</td>
            <td>${dev.name}</td>
            <td>
                <button class="fire-button button-35">Fire</button>
            </td>
        `;

    tr.innerHTML = trContent;
    devTableBody.appendChild(tr);
  }
}

function category() {
  let category = this.dataset.value;

  let currentCategory = document.querySelector(`.a-${category}`);
  categoryBtn.forEach((cBtn) => cBtn.classList.remove("active"));
  currentCategory.classList.add("active");
  console.log(currentCategory);

  const dash = document.getElementById("dashboard");
  const order = document.getElementById("orders");
  const cust = document.getElementById("customers");
  const md = document.getElementById("managedev");

  if (category === "dashboard") {
    dash.style.display = "block";
    order.style.display = "none";
    cust.style.display = "none";
    md.style.display = "none";
  } else if (category === "orders") {
    dash.style.display = "none";
    order.style.display = "block";
    cust.style.display = "none";
    md.style.display = "none";
    orderTable(orderData.length);
  } else if (category === "customers") {
    dash.style.display = "none";
    order.style.display = "none";
    cust.style.display = "block";
    md.style.display = "none";
  } else if (category === "managedev") {
    dash.style.display = "none";
    order.style.display = "none";
    cust.style.display = "none";
    md.style.display = "block";
    devTable(devData.length);
  }
}

const categoryBtn = document.querySelectorAll(".sidebar a");

categoryBtn.forEach((btn) => {
  btn.addEventListener("click", category);
});

function fetchAgain() {
  const order = document.getElementById("orders");
  const md = document.getElementById("managedev");
  const total = document.getElementById("total");
  const ongoing = document.getElementById("ongoing");
  const finished = document.getElementById("finish");
  fetchData("http://localhost:8080/projects").then((clientFetchData) => {
    data = clientFetchData;
    orderData = clientFetchData;

    let ongoingCount = 0;
    let finishedCount = 0;

    for (const order of orderData) {
      if (order.project_status === "Ongoing") {
        ongoingCount++;
      } else if (order.project_status === "Finished") {
        finishedCount++;
      }
    }

    total.textContent = orderData.length;
    ongoing.textContent = ongoingCount;
    finished.textContent = finishedCount;
    refreshTable(6);
    if (order.style.display === "block") {
      orderTable(orderData.length);
    } else if (md.style.display === "block") {
      devTable(devData.length);
    }
  });
}

fetchData("http://localhost:8080/clientFetch").then((clientFetchData) => {
  clientData = clientFetchData;
  clientTable(3);
});

fetchData("http://localhost:8080/devFetch").then((clientFetchData) => {
  devData = clientFetchData;
});

document.addEventListener("click", function (event) {
  const target = event.target;
  const projectRow = target.closest("tr");
  const fullname = document.getElementById('nama').value;
  let message;

  if (target.classList.contains("finish-button")) {
    const projectId = projectRow.querySelector("td:nth-child(2)").textContent;
    if (projectId.includes('W')){
      message = ` Finished Website`;
    } else if(projectId.includes('S')){
      message = ` Finished FiveM Server`;
    } else {
      message = ` Finished Discord Bot`;
    }
    sendProjectStatusUpdate(projectId, "Finished");
    sendRecentUpdate(projectId, fullname, message);
  } else if (target.classList.contains("ongoing-button")) {
    const projectRow = target.closest("tr");
    const projectId = projectRow.querySelector("td:nth-child(2)").textContent;
    if (projectId.includes('W')){
      message = ` Starting Website`;
    } else if(projectId.includes('S')){
      message = ` Starting FiveM Server`;
    } else {
      message = ` Starting Discord Bot`;
    }
    sendProjectStatusUpdate(projectId, "Ongoing");
    sendRecentUpdate(projectId, fullname, message);
  } else if (target.classList.contains("fire-button")) {
    const id = projectRow.querySelector("td:nth-child(1)").textContent;
    sendDevFire(id);
  }
});

function sendRecentUpdate(projectId, fullname, message) {
  fetch(`http://localhost:8080/ru/`, {
    method: "POST",
    body: JSON.stringify({ fullname, projectId, message }),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      if (response.ok) {
        console.log("Recent update sent successfully");
      } else {
        console.error("Failed to send recent update");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function sendProjectStatusUpdate(projectId, newStatus) {
  console.log(newStatus);
  const data = {
    projectId: projectId,
    newStatus: newStatus,
  };

  fetch(`http://localhost:8080/projects/updateProject/`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => {
      if (response.ok) {
        alert("Success!");
        fetchAgain();
      } else {
        alert("Failed!");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function sendDevFire(id) {
  const data = {
    id: id,
  };

  fetch(`http://localhost:8080/devFire/`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => {
      if (response.ok) {
        alert("Success!");
        fetchData("http://localhost:8080/devFetch").then((clientFetchData) => {
          devData = clientFetchData;
          devTable(devData.length);
        });
      } else {
        alert("Failed!");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

fetchAgain();
