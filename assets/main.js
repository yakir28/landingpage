/**
   * whatsapp
   */
let whatsapp = select('.whatsapp')
if (whatsapp) {
  const togglewhatsapp = () => {
    if (window.scrollY > 100) {
      whatsapp.classList.add('active')
    } else {
      whatsapp.classList.remove('active')
    }
  }
  window.addEventListener('load', togglewhatsapp)
  onscroll(document, togglewhatsapp)
}
