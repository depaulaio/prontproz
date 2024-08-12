function openTab(evt, tabName) {
  var i, tabcontent, tabbuttons
  tabcontent = document.getElementsByClassName('tab-content')
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = 'none'
  }
  tabbuttons = document.getElementsByClassName('tab-button')
  for (i = 0; i < tabbuttons.length; i++) {
    tabbuttons[i].className = tabbuttons[i].className.replace(' active', '')
  }
  document.getElementById(tabName).style.display = 'block'
  evt.currentTarget.className += ' active'
}
document.getElementsByClassName('tab-button')[0].click()

/*
window.onload = function () {
  const urlParams = new URLSearchParams(window.location.search)
  if (urlParams.has('success')) {
    alert('Dados do paciente salvos com sucesso!')
  }
}
*/

function internarPaciente() {
  alert('Paciente Internado')
  const allI = document.querySelectorAll('input', 'textarea')
  const allT = document.querySelectorAll('textarea')
  allI.forEach(function (item) {
    console.log(item)
    item.value = ''
  })
  allT.forEach(function (item) {
    console.log(item)
    item.value = ''
  })
}
