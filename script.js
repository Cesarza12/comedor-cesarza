// ==================== CARRUSEL ====================
const slideIndices = {};

function moveSlideGroup(id, direction) {
  const slides = document.getElementById(id);
  if (!slideIndices[id]) slideIndices[id] = 0;
  const total = slides.children.length;

  slideIndices[id] += direction;
  if (slideIndices[id] < 0) slideIndices[id] = total - 1;
  if (slideIndices[id] >= total) slideIndices[id] = 0;

  slides.style.transform = `translateX(-${slideIndices[id] * 100}%)`;
}

// Auto-mover cada carrusel cada 5 segundos
setInterval(() => {
  for (const id in slideIndices) {
    moveSlideGroup(id, 1);
  }
}, 5000);

// ==================== WHATSAPP ====================
document.addEventListener('DOMContentLoaded', () => {
  const btnWhatsapp = document.getElementById('btn-whatsapp');
  if (btnWhatsapp) {
    btnWhatsapp.addEventListener('click', function (e) {
      e.preventDefault();

      const titulo = document.querySelector('.submenu-header h1')?.innerText || 'Platillo';
      const img = document.querySelector('.content-container img');

      // Obtiene imagen desde atributo personalizado (debe ser una URL pública)
      const imgUrl = img?.dataset?.whatsimg || 'https://i.imgur.com/YMOvzDW.jpeg';

      const mensaje = `¿Desea comprar este platillo?\n*${titulo}*\nImagen: ${imgUrl}`;
      const numeroWhatsApp = '50589712485'; // Reemplaza con tu número real

      const url = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensaje)}`;
      window.open(url, '_blank');
    });
  }
});
