Custom Attachments v1.1
--------------

* Yapımcı: Mehmet Hanoğlu ( dle.net.tr )
* Tarih : 15.07.2014
* Lisans : MIT
* DLE : Yalnızca 10.2


Sistemde var olan {custom..} tagı gibi kullanıma sahip olan "Custom Attachments" eklentisi ile makalenize eklemiş olduğunuz dosyaları kendinizin belirlediği bir şablon (.tpl) dosyası yardımıyla makalenizde listeleyebilirsiniz. Eğer sitenizde her makalenize birden çok dosya ekliyorsanız ve bu dosyaları düzenli bir şekilde sunmak istiyorsanız. Bu eklenti ile tüm bunları yapabilirsiniz.


Yeni sürümde hem ilave alan desteği hemde short/full story desteği bulunmaktadır. Herhangi bir alana eklediğiniz eklentileri dilediğiniz gibi şablon dosyası yardımıyla gösterebilirsiniz. Custom mantığı ile çalışmaktadır.
Alana girilen [attachment=1], .... kodlarını okuyarak bu eklenti ID lerinin veritabanından karşılığını bulup belirlediğiniz şablon dosyasındaki  etiketlere göre listeler.
Birden çok dosya yüklemeniz gereken makalelerde, yüklenen tüm dosyaları bu şekilde listelemek kullanışlı olacaktır.
Her dosya için kullanılacak olan şablon dosyası ile tamamen özgün bir yapı elde edebilirsiniz. Bu işlem yalnızda fullstory için yapılmıştır.

fullstory.tpl de çalıştırabileceğiniz kullanım örnekleri :
--------------
Fullstory'ye eklenen eklentileri göster ve fullstory'den kaldır
Ekran Görüntüsü
~~~
{attach story="full" template="attachment" ignore="yes" order="id" by="desc"}
~~~


Fullstory'ye eklenen eklentileri göster ve fullstory'den kaldırma
Ekran Görüntüsü
~~~
{attach story="full" template="attachment" ignore="no" order="id" by="desc"}
~~~


file İlave alanından oku
Ekran Görüntüsü
~~~
{attach xfield="files" template="attachment" order="id" by="desc"}
~~~


Kullanılabilir belirteçler
--------------
* xfield="files" ( files ilave alanındaki verileri okur )
* template="attachment" ( temanızın ana dizinindeki attachment.tpl şablonunu kullanır )
* order="id" ( id ye göre sıralama için, geçerli tüm sıralama kriterleri kullanılabilir etiketler ile aynıdır )
* by="desc" ( asc veya desc yani artan veya azalan şeklinde sıralama belirtebilirsiniz )
* source="full" ( fullstorydeki eklentileri okur )
* source="short" ( shortstorydeki eklentileri okur )
* ignore="yes" ( yes|no - Eğer source belirteci kullanılmışsa aktif olur, eklentilerin kaynaktan kaldırmasını sağlar )

attachment.tpl Kullanılabilir etiketler:
--------------
* {seo-url} ( .htaccess dosyanıza ekleyeceğiniz tek satırlık kod ile SEF link olarak kullanabilirsiniz )
* {url} ( seo-url etiketi ile aynı işlevi görür. Farklı olarak link DLE'nin eklenti sistemindeki link ile aynıdır )
* {id} ( Dosyanın ID'si )
* {author} ( Dosyayı yükleyen kullanıcının adı - link değil ! )
* {date} ( Dosyanın yüklenme tarihi, DLE deki diğer kullanımlar ile uyumludur. Örnek: {date=Y.m.d} )
* {count} ( Dosyanın indirilme sayısı )
* {onserver} ( Dosyanın sunucudaki adı ) 
* {size} ( Dosyanın boyutu )

Modül Sayfası : http://dle.net.tr/dle-modul/17-custom-attachments.html
