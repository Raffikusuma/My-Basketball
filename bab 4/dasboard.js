document.addEventListener('DOMContentLoaded', function() {
    showSnackbar();
});

function showSnackbar() {
    const snackbar = document.getElementById('snackbar');
    snackbar.className = "show";
    setTimeout(function() { 
        snackbar.className = snackbar.className.replace("show", ""); 
    }, 3000); // Durasi munculnya snackbar
}

function showPemainAlert() {
    alert("Anda mengklik tombol PEMAIN");
}

function showPertandinganConfirm() {
    let confirmation = confirm("Apakah Anda ingin melihat jadwal pertandingan?");
    if (confirmation) {
        document.getElementById("demo").innerHTML = "Anda memilih untuk melihat jadwal pertandingan.";
    } else {
        document.getElementById("demo").innerHTML = "Anda memilih untuk tidak melihat jadwal pertandingan.";
    }
}
