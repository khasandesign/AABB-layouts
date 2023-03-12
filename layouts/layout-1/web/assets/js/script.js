/**
 * Get sidebar parts
 * @returns Sidebar Parts
 */
function getSidebarParts() {
  let sidebar = document.querySelector('.sidebar'),
    sidebarParts = sidebar.querySelectorAll('.sidebar-part')

  return sidebarParts
}

/**
 * Attach to sidebar parts to targeted sections
 */
function attachSidebarParts() {
  let sidebarParts = getSidebarParts()

  for (let i = 0; i < sidebarParts.length; i++) {
    let target = sidebarParts[i].getAttribute('data-target')
    if (target) {
      let targetOffset = document.getElementById(target).offsetTop,
        elOffset = sidebarParts[i].offsetTop

      sidebarParts[i].style.top = targetOffset - elOffset + 'px'
    }
  }
}

/**
 * Convert Hex to RGB
 * @param hex
 * @param str
 * @returns {{r: number, b: number, g: number}|null}
 */
function hexToRgb(hex, str = false) {
  var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);

  if (result) {
    let rgb_obj = {
      r: parseInt(result[1], 16),
      g: parseInt(result[2], 16),
      b: parseInt(result[3], 16)
    }

    if (str) {
      return rgb_obj['r'] + ',' + rgb_obj['g'] + ',' + rgb_obj['b']
    } else {
      return rgb_obj
    }
  }
  return null
}


document.addEventListener('DOMContentLoaded', function () {

  // Attrach sidebar parts
  if (window.innerWidth > 768) {
    attachSidebarParts()
  }

  // Adjust iframe
  window.addEventListener('blur', function () {
    if (document.activeElement.tagName == 'IFRAME') {
      document.activeElement.style.width = 100 + '%';
    }
  })

  // Set category background color
  let feed = document.querySelector('.feed')
  if (feed.hasAttribute('data-bg-color')) {
    document.body.style.setProperty('--ds-bg-accent', 'rgba(' + hexToRgb(feed.getAttribute('data-bg-color'), true) + ', 0.1)')
  }

  // Submit digest
  document.querySelector('#digest-form').addEventListener('submit', function (e) {
    e.preventDefault()
    let email = e.target.querySelector('input[type=email]').value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", '/subscribe-email', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
      if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
        e.target.reset();
        alert('You successfuly subscribed to our digest!');
      }
    }
    xhr.send('email=' + email);
  })
})