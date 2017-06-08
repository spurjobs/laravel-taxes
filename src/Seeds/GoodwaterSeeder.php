<?php

namespace Appleton\Taxes\Seeds;

use Appleton\Taxes\Countries\US\Alabama\GoodwaterOccupational;
use DB;
use Illuminate\Database\Seeder;

class GoodwaterSeeder extends Seeder
{
    public function run()
    {
        $id = DB::table('governmental_unit_areas')->insertGetId([
            'name' => 'Goodwater, AL',
            'area' => '0106000020E6100000010000000103000000010000003400000015E29178798455C0A6EB89AE0B854040F816D68D778455C0B69BE09BA685404029E96168758455C0450F7C0C56864040EEEA5564748455C0743FA7203F87404018B2BAD5738455C0600322C49587404071FDBB3E738455C07747C66AF38740407EC51A2E728455C041800C1D3B88404054185B08728455C0FD851E317A884040AE635C71718455C0C6F65AD07B8940403DF03158718455C09DD7D825AA8940404F75C8CD708455C0887E6DFDF489404008C90226708455C04643C6A3548A4040DE1B4300708455C065FED137698A4040D95E0B7A6F8455C097512CB7B48A4040FC321823128455C0DC10E335AF8A4040EACE13CFD98355C0D787F546AD8A4040F6065F984C8355C040A20914B18A40403A92CB7F488355C0B115342DB18A40407B681F2BF88255C041D653ABAF8A40405706D506278255C06395D233BD8A4040A4A31CCC268255C0D55B035B258A40400A9DD7D8258255C0F984ECBC8D89404057207A52268255C0268C6665FB884040344A97FE258255C0EC1516DC0F884040289CDD5A268255C014CD0358E4874040EC832C0B268255C0EF737CB438874040E0BBCD1B278255C0DBDE6E490E864040EE224C512E8255C02506819543854040417DCB9C2E8255C0F9B9A1293B854040C5A9D6C22C8255C09FA9D72D02854040CB80B3942C8255C01ADEACC1FB844040E97FB9162D8255C0E76C01A1F5844040323674B33F8255C0CCEF3499F18440403C2EAA45448255C096AE601BF1844040D5B2B5BE488255C0D2E0B6B6F0844040EC116A86548255C0D314014EEF844040B9C2BB5CC48255C0FEF2C98AE1844040B21188D7F58255C0FB05BB61DB8440409D47C5FF1D8355C08AC6DADFD9844040C0E95DBC1F8355C05A0EF450DB8440401EA4A7C8218355C053E9279CDD84404075AA7CCF488355C09BC937DBDC844040D0B4C4CA688355C0AC00DF6DDE8440405E471CB2818355C070CE88D2DE84404000529B38B98355C05872158BDF844040F94CF6CFD38355C0ECBB22F8DF844040D2A92B9FE58355C087C267EBE08440402DEBFEB1108455C0D593F947DF8440409335EA211A8455C0768BC058DF84404004745FCE6C8455C06ADD06B5DF8440409D7DE5417A8455C0A930B610E484404015E29178798455C0A6EB89AE0B854040',
        ]);

        DB::table('tax_areas')->insert([
            'name' => 'Goodwater Occupational Tax',
            'tax' => GoodwaterOccupational::class,
            'governmental_unit_area_id' => $id,
        ]);
    }
}