package com.googles.harikedua;

import android.app.AlertDialog;
import android.app.Dialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class HitungHitungDuit extends AppCompatActivity {
    //buat variabel global
     EditText edtNilaiPertama, edtNilaiKedua;
    Button btnHitung;
    TextView tvHasil ;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //panggil view
        setContentView(R.layout.hitung_duit);
        //inisilisasi
        edtNilaiPertama = (EditText) findViewById(R.id.edt_nilai_pertama);
        edtNilaiKedua = (EditText) findViewById(R.id.edt_nilai_kedua);
        btnHitung = (Button) findViewById(R.id.btn_hitung);
        tvHasil = (TextView) findViewById(R.id.tv_hasil);
        //listiner button
        btnHitung.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                hitungHitungDuitgakAda();
            }
        });
    }

    private void hitungHitungDuitgakAda() {
       //buat variabel untuk ambil nilai di editext
        String ambilNilaiPertama = edtNilaiPertama.getText().toString();
        String ambilNilaikedua = edtNilaiKedua.getText().toString();
       // validasi
        if (ambilNilaiPertama.isEmpty() || ambilNilaikedua.isEmpty()){
            Toast.makeText(this, "oy masih kosong nilai edittext", Toast.LENGTH_SHORT).show();
        } else
            {
            //penjumalahannya
            Long hasil = Long.parseLong(ambilNilaiPertama) + Long.parseLong(ambilNilaikedua);
            tvHasil.setText("Hasilnya adalah " + hasil);

            //dialog
            final AlertDialog.Builder alertDialog = new AlertDialog.Builder(this);
            //attribut title dan message
            alertDialog.setTitle("Hasil dari penjumlahan");
            alertDialog.setMessage("Hasilnya adalah " + hasil);
            alertDialog.setCancelable(false);

            //postif button ada parameter ("nama button", listiner)
            alertDialog.setPositiveButton("OK", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialogInterface, int i) {
                    edtNilaiPertama.setText("");
                    edtNilaiKedua.setText("");
                }
            });
            alertDialog.setNegativeButton("No", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialogInterface, int i) {
                   //intent pindah activity
                    // punya 2 paramater (context/activity dia berasal, pindah kemana?(activity))
                    Intent pindahKeactivityLain = new Intent(HitungHitungDuit.this,WebviewActivity.class);
                    //di start / mulai
                    startActivity(pindahKeactivityLain);

                }
            });


                alertDialog.show();
        }

    }
}
