// ** I18N

// Calendar EN language
// Author: Mihai Bazon, <mihai_bazon@yahoo.com>
// Encoding: any
// Distributed under the same terms as the calendar itself.

// For translators: please use UTF-8 if possible.  We strongly believe that
// Unicode is the answer to a real internationalized world.  Also please
// include your contact information in the header, as can be seen above.

// full day names

try {
Calendar._DN = new Array
("Pazar",
 "Pazartesi",
 "Sali",
 "Carsamba",
 "Persembe",
 "Cuma",
 "Cumartesi",
 "Pazar");

// Please note that the following array of short day names (and the same goes
// for short month names, _SMN) isn't absolutely necessary.  We give it here
// for exemplification on how one can customize the short day names, but if
// they are simply the first N letters of the full name you can simply say:
//
//   Calendar._SDN_len = N; // short day name length
//   Calendar._SMN_len = N; // short month name length
//
// If N = 3 then this is not needed either since we assume a value of 3 if not
// present, to be compatible with translation files that were written before
// this feature.

// short day names
Calendar._SDN = new Array
("Paz",
 "Pts",
 "Sal",
 "Car",
 "Per",
 "Cum",
 "Cts",
 "Paz");

// First day of the week. "0" means display Sunday first, "1" means display
// Monday first, etc.
Calendar._FD = 1;

// full month names
Calendar._MN = new Array
("Ocak",
 "Subat",
 "Mart",
 "Nisan",
 "Mayis",
 "Haziran",
 "Temmuz",
 "Agustos",
 "Eylul",
 "Ekim",
 "Kasim",
 "Aralik");

// short month names
Calendar._SMN = new Array
("Oca",
 "Sub",
 "Mar",
 "Nis",
 "May",
 "Haz",
 "Tem",
 "Agu",
 "Eyl",
 "Eki",
 "Kas",
 "Ara");

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "Tarihi Sil";
Calendar._TT["ABOUT"] = "Yapi Kredi Bankasi";
Calendar._TT["PREV_YEAR"] = "Onceki Yil (Menu icin basili tutunuz)";
Calendar._TT["PREV_MONTH"] = "Onceki Ay (Menu icin basili tutunuz)";
Calendar._TT["GO_TODAY"] = "Bugune git";
Calendar._TT["NEXT_MONTH"] = "Sonraki Ay (Menu icin basili tutunuz)";
Calendar._TT["NEXT_YEAR"] = "Sonraki Yil (Menu icin basili tutunuz)";
Calendar._TT["SEL_DATE"] = "Tarih seciniz";
Calendar._TT["DRAG_TO_MOVE"] = "Tasimak icin surukleyiniz";
Calendar._TT["PART_TODAY"] = " (bugun)";

// the following is to inform that "%s" is to be the first day of week
// %s will be replaced with the day name.
Calendar._TT["DAY_FIRST"] = "%s'i once goster";

// This may be locale-dependent.  It specifies the week-end days, as an array
// of comma-separated numbers.  The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "6,0";

Calendar._TT["CLOSE"] = "Kapat";
Calendar._TT["TODAY"] = "Bugun";
Calendar._TT["TIME_PART"] = "(Shift-)Tiklayin ya da degistirmek icin surukleyin";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%m-%d";
Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e";

Calendar._TT["WK"] = "hafta";
Calendar._TT["TIME"] = "Saat:";

Calendar._TT["DEL"] = "Sil";

} catch (e) {
//alert("msg" + e.message);
}
