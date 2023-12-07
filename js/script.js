
function form() {
  const nama = document.getElementById("nama").value;
  const jmlh = document.getElementById("pwd").value;
  const no = document.getElementById("pwd").value;
}

const order = document.getElementById('order');
order.addEventListener('click', function() {
  Swal.fire({
         title:'Selamat Datang',
         text :'Anda Berhasil Login',
         icon :'success'
  })
})

