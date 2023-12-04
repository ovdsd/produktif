const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggle = document.querySelector(".theme-toggle");
const form = document.querySelector('#order-form');
let savedTheme = '';
let data;
let orderData;
let clientData;

fetchTheme();

async function fetchData(link) {
    const response = await fetch(link);
    let clientFetchData = await response.json();
    return clientFetchData;
}

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

function fetchTheme(){
    fetchData('http://localhost:8080/getTheme/').then((clientFetchData) => {
        savedTheme = clientFetchData.theme;
        applyTheme();
    })
    .catch((error) => {
        console.error('Error fetching theme:', error);
    });
}

function applyTheme() {
    if (savedTheme === 'Dark') {
        document.body.classList.add('dark-theme-variables');
        themeToggle.querySelector('span:nth-child(1)').classList.remove('active');
        themeToggle.querySelector('span:nth-child(2)').classList.add('active');
    } else {
        document.body.classList.remove('dark-theme-variables');
        themeToggle.querySelector('span:nth-child(1)').classList.add('active');
        themeToggle.querySelector('span:nth-child(2)').classList.remove('active');
    }
}

themeToggle.addEventListener('click', () => {
    toggleTheme();
});

function toggleTheme() {
    if (savedTheme === 'Light') {
        savedTheme = 'Dark';
    } else {
        savedTheme = 'Light';
    }
    applyTheme();
    setTheme(savedTheme);
}

async function setTheme(theme) {
    const response = await postTheme(theme);

    if (response.ok) {
        console.log('Theme updated successfully');
    } else {
        console.error('Failed to update theme');
    }
}

async function postTheme(theme) {
    return await fetch(`http://localhost:8080/setTheme/${theme}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    });
}

function orderTable(maxRows) {
    const tableBody = document.querySelector('.myproject table tbody');
    tableBody.innerHTML = '';

    if (!orderData || orderData.length === 0) {
        const noDataRow = document.createElement('tr');
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
        const tr = document.createElement('tr');
        const trContent = `
            <td>${orders.project_name}</td>
            <td>${orders.project_id}</td>
            <td class="${orders.payment_status === 'Unpaid' ? 'danger' : orders.payment_status === 'Cancel' ? 'danger' : 'success'}" style="font-weight: bold;">${orders.payment_status}</td>
            <td class="${orders.project_status === 'Queue' ? 'text_muted' : orders.project_status === 'Ongoing' ? 'warning' : orders.project_status === 'Cancel' ? 'danger' : 'success'}" style="font-weight: bold;">${orders.project_status}</td>
            <td>
                ${orders.payment_status === 'Unpaid' ? 
                    `<button class="cancel-button button-35">Cancel</button><span>    </span><button class="pay-button button-35">Pay</button>`
                    : ''
                }
            </td>
        `;

        tr.innerHTML = trContent;
        tableBody.appendChild(tr);
    }
}

document.addEventListener('click', function (event) {
    const target = event.target;
    const projectRow = target.closest('tr');

    if (target.classList.contains('pay-button')) {
        const projectId = projectRow.querySelector('td:nth-child(2)').textContent;
        sendPaymentStatusUpdate(projectId, 'Paid');
    } else if (target.classList.contains('cancel-button')) {
        const projectRow = target.closest('tr');
        const projectId = projectRow.querySelector('td:nth-child(2)').textContent;
        sendPaymentStatusUpdate(projectId, 'Cancel');
    }
});

function sendPaymentStatusUpdate(projectId, newStatus) {
    console.log(newStatus);
    const data = {
        projectId: projectId,
        newStatus: newStatus
    };

    fetch(`http://localhost:8080/projects/update/`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => {
            if (response.ok) {
                alert("Success!");
                fetchAgain();
            } else {
                alert("Failed!");
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function category() {
    let category = this.dataset.value;

    let currentCategory = document.querySelector(`.a-${category}`);
    categoryBtn.forEach((cBtn) => cBtn.classList.remove("active"));
    currentCategory.classList.add("active");
    console.log(currentCategory);

    const form = document.getElementById('form');
    const myp = document.getElementById('myproject');
    
    if (category === 'form') {
        myp.style.display = 'none';
        form.style.display = 'block';
    }else if (category === 'myproject') {
        form.style.display = 'none';
        myp.style.display = 'block';
        fetchAgain();
    }
}

const categoryBtn = document.querySelectorAll(".sidebar a");

categoryBtn.forEach((btn) => {
    btn.addEventListener("click", category);
})

function fetchAgain(){
    fetchData('http://localhost:8080/projectFetch').then((clientFetchData) => {
    orderData = clientFetchData;
    console.log(orderData);
    orderTable(orderData.length);
});
};

async function generateProjectID(projectType) {
    try {
      const response = await fetch(`http://localhost:8080/projects/getProjectCounter/${projectType}`);
      if (response.ok) {
        const data = await response.json();
        const counter = data.counter;
        return formatProjectID(projectType, counter);
      } else {
        throw new Error('Failed to fetch project counter');
      }
    } catch (error) {
      console.error('Error:', error);
      throw error;
    }
  }
  
  function formatProjectID(projectType, counter) {
    if (projectType === 'web') {
      return `W${counter.toString().padStart(4, '0')}`;
    } else if (projectType === 'bot') {
      return `B${counter.toString().padStart(4, '0')}`;
    } else if (projectType === 'server') {
      return `S${counter.toString().padStart(4, '0')}`;
    } else {
      throw new Error('Invalid project type');
    }
  }
  
  form.addEventListener('submit', async event => {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
  
    const projectName = formData.get('project_name');
    const userId = formData.get('user_id');
    const projectType = formData.get('project_type');
    const projectID = await generateProjectID(projectType);
  
    const requestData = {
      project_name: projectName,
      project_id: projectID,
      user_id: userId,
    };
  
    console.log(JSON.stringify(requestData));
  
    const response = await fetch('http://localhost:8080/projects/create', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(requestData),
    });
  
    if (response.status === 200) {
      console.log('Order posted successfully!');
    } else {
      console.error('Error posting order:', response.statusText);
    }

    form.reset();
  });
  
  function addUpdate(updateData) {
    const updatesContainer = document.getElementById("updates-container");

    const updateDiv = document.createElement("div");
    updateDiv.classList.add("update");

    const profilePhoto = document.createElement("div");
    profilePhoto.classList.add("profile-photo");
    profilePhoto.innerHTML = '<span class="material-icons-sharp">account_circle</span>';

    const messageDiv = document.createElement("div");
    messageDiv.classList.add("message");
    messageDiv.innerHTML = `
        <p><b>${updateData.username}</b> ${updateData.message} | Project ID ${updateData.projectID}</p>
        <small class="text-muted">${updateData.timestamp}</small>
    `;

    updateDiv.appendChild(profilePhoto);
    updateDiv.appendChild(messageDiv);

    updatesContainer.appendChild(updateDiv);
}

async function fetchUpdates() {
    try {
        const response = await fetch('http://localhost:8080/ru');
        if (response.ok) {
            const updates = await response.json();
            updates.forEach((updateData) => {
                addUpdate(updateData);
            });
        } else {
            console.error('Failed to fetch updates');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}
