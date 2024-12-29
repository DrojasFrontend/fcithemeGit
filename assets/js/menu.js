document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.getElementById("js-toggle-button");
  const menuMobile = document.getElementById("js-menu-mobile");
  const bodyOverflow = document.getElementById("js-body-overflow");

  toggleButton.addEventListener("click", function () {
    this.classList.toggle("is-active");
    menuMobile.classList.toggle("is-active");
    bodyOverflow.classList.toggle("is-active");
  });
});

/* Menu Escritorio */
document.addEventListener("DOMContentLoaded", function () {
  var menuItems = document.querySelectorAll(".has-submenu");

  menuItems.forEach(function (menuItem) {
    var subMenu = findSubMenu(menuItem);

    menuItem.addEventListener("mouseover", function () {
      if (subMenu) {
        menuItem.classList.add("is-hover");
      }
    });

    menuItem.addEventListener("mouseleave", function () {
      if (subMenu) {
        menuItem.classList.remove("is-hover");
      }
    });

    if (subMenu) {
      subMenu.addEventListener("mouseover", function () {
        menuItem.classList.add("is-hover");
      });

      subMenu.addEventListener("mouseleave", function () {
        menuItem.classList.remove("is-hover");
      });
    }
  });

  function findSubMenu(element) {
    var sibling = element.nextElementSibling;
    while (sibling) {
      if (sibling.tagName.toLowerCase() === "div") {
        var potentialSubMenu = sibling.querySelector(
          ".sub-menu-nivel-0-wrapper, .sub-menu-nivel-1-wrapper, .sub-menu-nivel-2-wrapper, .sub-menu-nivel-3-wrapper"
        );
        if (potentialSubMenu) {
          return potentialSubMenu;
        }
      }
      sibling = sibling.nextElementSibling;
    }
    return null;
  }
});

/* Menu Mobile */
document.addEventListener("DOMContentLoaded", function () {
  const hasSubmenu = document.querySelectorAll(".has-submenu-mobile");
  const allSubmenus = document.querySelectorAll(
    ".sub-menu-mobile-nivel-0, .sub-menu-mobile-nivel-1, .sub-menu-mobile-nivel-2, .sub-menu-mobile-nivel-3"
  );

  function closeAllSubmenus() {
    allSubmenus.forEach(function (submenu) {
      submenu.classList.remove("is-open");
    });
  }

  function handleSubmenuClick(event) {
    event.preventDefault();
    const submenu = this.nextElementSibling;

    if (submenu.classList.contains("is-open")) {
      submenu.classList.remove("is-open");
    } else {
      closeAllSubmenus();
      submenu.classList.add("is-open");
    }
  }

  hasSubmenu.forEach(function (item) {
    item.addEventListener("click", handleSubmenuClick);
  });

  const submenuTitles = document.querySelectorAll(
    ".sub-menu-mobile-nivel-0-title, .sub-menu-mobile-nivel-1-title, .sub-menu-mobile-nivel-2-title, .sub-menu-mobile-nivel-3-title"
  );

  function handleTitleClick() {
    const parentSubMenu = this.parentElement.parentElement;
    const grandParentSubMenu = parentSubMenu.parentElement.parentElement;

    parentSubMenu.classList.remove("is-open");
    grandParentSubMenu.classList.add("is-open");
  }

  submenuTitles.forEach(function (title) {
    title.addEventListener("click", handleTitleClick);
  });
});
