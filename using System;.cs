using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace project
{


    internal class Siswa : Orang
    {
        public void Belajar()
        {
            Console.WriteLine("saya sedang belajar");
        }
    }

    internal class Dosen : Orang
    {
        public void Mengajar()
        {
            Console.WriteLine("saya sedang mengajar");
        }
    }
    internal class Orang
    {
        public int Umur;
        public int TampilUmur()
        {
            return Umur;
        }

        public void SetUmur(int umur)
        {
            Umur = umur;
        }
    }

    class Program
    {
        static void Main(String[] args)
        {
            Siswa siswa = new Siswa();
            siswa.Belajar();
            Dosen dosen = new Dosen();
            dosen.Mengajar();
            Orang orang = new Orang();
            orang.SetUmur(19);
            Console.WriteLine(orang.TampilUmur());
        }


    }
}
