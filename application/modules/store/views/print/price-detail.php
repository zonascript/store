<style>
  body{
    font-size: smaller;
    font-family: arial;
  }
  table{
    font-size: smaller;
  }
</style>
<body>
  <table width="100%">
    <tr>
      <td rowspan="2"><img src="<?php print base_url()."themes/antavaya/images/logo.png"?>" /></td>
      <td><h1 style="text-align: center">Formulir Pemesanan Tour</h1></td>
    </tr>
    <tr>
      <td><h4 style="text-align: center"><?php print $store->title." Telp {$store->telp} Fax {$store->fax}"?></h4></td>
    </tr>
  </table>
  <hr />
  <b>Buyer (<?php print $book_code?>)</b><br />
  <table width="100%">
    <tr>
      <td>Product</td>
      <td>: <?php print $tour->title?></td>
      <td>Contact</td>
      <td>: <?php print $book->first_name." ".$book->last_name?></td>
    </tr>
    <tr>
      <td>Date of Depart</td>
      <td>: <?php print date("d M y", strtotime($tour->information->start_date))?></td>
      <td>From</td>
      <td>: <?php print $tour->information->keberangkatan?></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td>: <?php print $book->telphone?></td>
      <td>Email</td>
      <td>: <?php print $book->email?></td>
    </tr>
  </table>
  <hr />
  <b>Price Details</b><br />
  <table width="100%" style="border-style:double double double double; border-spacing: 0;">
    <tr>
      <td style="border-style:none none double none; padding-left: 3px;">Date</td>
      <td style="border-style:none none double ridge; padding-left: 3px;">Note</td>
      <td style="border-style:none none double ridge; padding-left: 3px;">&nbsp;</td>
    </tr>
    <?php
    foreach($payment AS $py){
      $debit = ($py->pos == 1 ? $py->nominal : 0);
      $kredit = ($py->pos == 2 ? $py->nominal : 0);
      $cetak = ($debit > 0 ? number_format($debit) : "(".number_format($kredit).")");
      print "<tr>"
        . "<td style='border-style:none none ridge none; padding-left: 3px;'>".date('d M y', strtotime($py->tanggal))."</td>"
        . "<td style='border-style:none none ridge ridge; padding-left: 3px;'>{$py->note}</td>"
        . "<td style='text-align: right; border-style:none none ridge ridge; padding-left: 3px;'>{$cetak}</td>";
      $t_debit += $debit;
      $t_kredit += $kredit;
    }
    ?>
    
    <tr>
      <td colspan="2" style="text-align: right; border-style:double none ridge none;"><b>TOTAL</b></td>
      <td style="text-align: right; border-style:double none ridge ridge;"><b><?php print number_format(($t_debit-$t_kredit))?></b></td>
    </tr>
  </table>
  <p style="font-size: 8px;">
    * Airport Tax Dapat Berubah sewaktu-waktu sampai tiket diisued <br />
    ** Visa dapat berubah sewaktu-waktu tergantung dari kedutaan
  </p>
  <b>Pax Details</b><br />
  <table width="100%" style="border-style:double double double double; border-spacing: 0;">
    <tr>
      <td style="border-style:none none double none; padding-left: 3px;">Nama</td>
      <td style="border-style:none none double ridge; padding-left: 3px;">Tgl Lahir</td>
      <td style="border-style:none none double ridge; padding-left: 3px;">Tipe</td>
    </tr>
    <?php
    foreach($book->passenger AS $bp){
      print "<tr>"
        . "<td style='border-style:none none ridge none; padding-left: 3px;'>{$bp->first_name} {$bp->last_name}</td>"
        . "<td style='border-style:none none ridge ridge; padding-left: 3px;'>".(strtotime($bp->tanggal_lahir) ? date("d M y", strtotime($bp->tanggal_lahir)) : '-')."</td>"
        . "<td style='text-align: right; border-style:none none ridge ridge; padding-left: 3px;'>{$bp->type->desc}</td>";
    }
    ?>
  </table>
  <p style="text-align: left; font-size: 8px;">
    Biaya di atas tidak mengikat, dapat berubah disesuaikan dengan kurs yang berlaku pada saat Full Payment
    <br />
    Pelunasan harus dilakukan 2 minggu sebelum keberangkatan, yaitu tanggal : <?php
    $berangkat = strtotime($tour->information->start_date);
    $now = strtotime("now");
    $dua_minggu = strtotime("+2 weeks");
    $selisih = $dua_minggu - $now;
    $lunas = $berangkat - $selisih;
    print date("d M y", $lunas);?> dengan membawa TTU (Tanda Terima Uang) atau bukti deposit asli.<br />
    Sesuai dengan ketentuan pemerintah, AntaVaya hanya menerima pembayaran dengan mata uang Rupiah
  <br />
    Selama proses Visa, Passport tidak bisa dipinjam dengan alasan apapun.<br/>
    Tour diberangkatkan apabila memenuhi minimum jumlah peserta (20/15 PAX) di luar apabila ada yang Cancel dan Visa ditolak
  <br />
    Jadwal perjalanan dan tanggal keberangkatan dapat berubah sesuai dengan kondisi demi kelancaran pelaksanaan tour
  <br />
    Deposit di atas 45 hari, tidak dapat diuangkan dan hanya dapat dibelikan product tour yang lain, apabila keluarga ada yang sakit/ meninggal disertai bukti rumah sakit/ surat meninggal, serta apabila adanya larangan terbang ke negara tujuan.
  </p>
  <p style="font-size: 8px;">
    P E M B A T A L A N :
  <ol style="font-size: 8px;">
    <li>Lebbih dari 45 hari sebelum keberangkatan, uang muka (Deposit) hilang</li>
    <li>44 - 16 hari sebelum keberangkatan, dikenakan 50% dari harga tour</li>
    <li>15 - 18 hari sebelum keberangkatan, dikenakan 75% dari harga tour</li>
    <li>07 - 01 hari sebelum keberangkatan, dikenakan 80% dari harga tour</li>
    <li>Hari H/ No Show - pada hari keberangkatan, dikenakan 100% dari harga tour</li>
  </ol>
  <span style="font-size: 8px;">
    Sesuai dengan ketentuan dari kedutaan, maka biaya Visa tetap harus dibayarkan walaupun Visa ditolak. Selain biaya Visa, peserta Tour juga akan dikenakan biaya administrasi ticket serta biaya lainnya, karena issued ticket tidak bisa menunggu hingga Visa selesai.
  </span>
  </p>
  <table width="100%">
    <tr>
      <td><?php print date("d F Y")?></td>
      <td>ANTAVAYA</td>
      <td>MENYETUJUI</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Materai</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Rp 6,000</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>(<?php print $this->session->userdata('name'); ?>)</td>
      <td>(Nama dan Tanda Tangan)</td>
    </tr>
  </table>
</body>