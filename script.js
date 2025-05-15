
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

const links = document.querySelectorAll('.nav-links a');

// Loop through the links and add a click event listener to each
links.forEach(link => {
  link.addEventListener('click', () => {
    // Remove the "active" class from the current active item
    const currentActive = document.querySelector('.nav-links a.active');
    currentActive.classList.remove('active');

    // Add the "active" class to the clicked item
    link.classList.add('active');
  });
});
