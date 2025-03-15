<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Re-Sum</title>
    <link rel="stylesheet" href="Fano&Evan.css" />
    <link rel="icon" href="faviocn.png" type="image/x-icon" />
    <style></style>
  </head>

  <body>
    <section id="beranda">
      <header>
        <div class="logo">
          <a href="friedrice.html">
            <img src="pictures/re_sumlogo.png" alt="logo" />
          </a>
        </div>
        <nav>
          <div class="nav">
            <a href="#beranda">BERANDA</a>
            <a href="#tentang">TENTANG</a>
            <a href="#hari">HARI</a>
            <a href="#kontak">KONTAK</a>
          </div>
        </nav>
        <div class="h1"></div>
      </header>
      <h1>Re-Sum</h1>
    </section>

    <section id="tentang">
      <div class="deskripsi">
        <h2>Tentang Re-Sum</h2>
        <p>
          Re-Sum adalah sebuah website yang berkaitan dengan pembelajaran di
          sekolah. Pembuatan website ini bertujuan untuk supaya murid-murid
          yang tidak masuk sekolah dapat menggunakan website ini untuk memahami
          materi-materi yang dijelaskan saat tidak masuk sekolah, agar tidak ketinggalan 
          materi yang dijelaskan guru di hari saat murid tidak masuk sekolah.
        </p>
      </div>
    </section>

    <section id="hari">
      <div class="hari">
        <h2>Hari</h2>
      </div>
      <div class="hari list">
        <a href="senin.html" target="_blank">Senin</a>
        <a href="selasa.html" target="_blank">Selasa</a>
        <a href="rabu.html" target="_blank">Rabu</a>
        <a href="kamis.html" target="_blank">Kamis</a>
        <a href="jumat.html" target="_blank">Jum'at</a>
      </div>
    </section>

    <section id="kontak">
      <div class="kontak">
        <h2>Kontak Kami</h2>
      </div>
      <div class="kontak-form">
        <form
          id="formkontak"
          method="POST"
          action="kirim.php"
          onsubmit="submitForm(event)"
        >
          <div class="form-group">
            <label for="nama">Nama</label>
            <input
              type="text"
              id="nama"
              name="nama"
              placeholder="Masukkan nama Anda"
              required
            />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Masukkan email Anda"
              required
            />
          </div>
          <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea
              id="pesan"
              name="pesan"
              rows="5"
              placeholder="Tulis pesan Anda"
              required
            ></textarea>
          </div>
          <button type="submit" class="submit-btn">Kirim Pesan</button>
        </form>
      </div>
      <div class="kontak-info">
        <div class="info-item">
          <div class="icon">‼️</div>
          <h3>Info</h3>
          <p>
            Anda dapat mengajukan materi untuk dimasukkan di Re-sum melalui section ini
            contohnya: <br>
            materi tentang Agama, di hari senin, materinya yaitu: <br> 
            Pak A: <i>kosong</i> <br>
            Pak B: bla bla bla bla bla <br>
            pak C: bli bli bli blu blu
          </p>
        </div>
      </div>
    </section>

    <footer>
      <p>&copy; 2025 BoiCrev.</p>
    </footer>
  </body>
  <script>
    // fungsi untuk mengirimkan form
    function submitForm(event) {
      // mencegah default behavior form
      event.preventDefault();

      // membuat objek FormData dari form
      var formData = new FormData(document.getElementById("formkontak"));

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "kirim.php", true);

      // menambahkan event listener untuk menangani respons server
      xhr.onload = function () {
        if (xhr.status === 200) {
          // Jika respons sukses, tampilkan alert dan reset form
          alert("Successfully submitted!");
          document.getElementById("formkontak").reset();
        } else {
          // jika respons gagal, tampilkan alert dengan pesan error
          alert("Something went wrong: " + xhr.statusText);
        }
      };

      // mengirimkan form
      xhr.send(formData);
    }

    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);

        if (response.status === "success") {
          alert(response.message); // menunjuka pesan sukses
          document.getElementById("formkontak").reset(); // meresetform
        } else {
          alert("Error: " + response.message); // menunjukan pesan error
        }
      } else {
        alert("Something went wrong: " + xhr.statusText);
      }
    };
  </script>
</html>
