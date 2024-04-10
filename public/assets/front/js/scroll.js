document.querySelector('.compared-block-table').addEventListener('mousedown', function(event) {
   event.preventDefault(); 
   const startX = event.pageX - this.offsetLeft; 
   const scrollLeft = this.scrollLeft; 
   this.style.cursor = 'grabbing'; 
   
   document.onmousemove = e => {
      const x = e.pageX - this.offsetLeft; 
      const walk = (x - startX) * 2;
      this.scrollLeft = scrollLeft - walk; 
   };

   document.onmouseup = () => {
      this.style.cursor = 'grab';
      document.onmousemove = null;
      document.onmouseup = null;
   };
});