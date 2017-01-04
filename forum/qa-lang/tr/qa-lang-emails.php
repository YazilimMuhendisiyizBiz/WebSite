<?php
	
/*
	Question2Answer 1.3.2 (c) 2011, Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-include/qa-lang-emails.php
	Version: 1.3.2
	Date: 2011-03-14 09:01:08 GMT
	Description: Language phrases for email notifications


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

	return array(
		"a_commented_body" => "^site_title'teki cevabınız ^c_handle tarafından yorumlandı:\n\n^open^c_content^close\n\nSizin cevabınız:\n\n^open^c_context^close\n\nKendi yorumunuzu ekleyerek yanıt verebilirsiniz:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		"a_commented_subject" => "^site_title'teki cevabınıza yeni bir yorum yapıldı",
		"a_followed_body" => "^site_title'teki cevabınıza ^q_handle tarafından benzer bir soru soruldu:\n\n^open^q_title^close\n\nSizin cevabınız:\n\n^open^a_content^close\n\nYeni soruya cevap vermek için tıklayınız:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		"a_followed_subject" => "^site_title'teki cevabınız için benzer bir soru soruldu:",
		"a_selected_body" => "Tebrikler! ^site_title'teki cevabınız ^s_handle tarafından en iyi cevap olarak seçildi:\n\n^open^a_content^close\n\nSoru:\n\n^open^q_title^close\n\nCevabınız görmek için aşağıya tıklayınız:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		"a_selected_subject" => "^site_title'teki cevabınız en iyi seçildi!",
		"c_commented_body" => "^site_title'teki yorumunuza ^c_handle tarafından yeni bir yorum eklendi :\n\n^open^c_content^close\n\nTartışma aşağıdaki gibidir:\n\n^open^c_context^close\n\nKendi yorumunuzu ekleyerek yanıt verebilirsiniz:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		"c_commented_subject" => "^site_title'teki yorumunuza başka bir yorum yapıldı",
		"confirm_body" => "^site_title e-posta adresinizi onaylamak için aşağıdaki bağlantıya tıklayınız\n\n^url\n\nTeşekkürler,\n^site_title",
		"confirm_subject" => "^site_title - E-posta Adresi Doğrulama",
		"feedback_body" => "Yorumlar:\n^message\n\nName:\n^name\n\nEmail:\n^email\n\nPrevious page:\n^previous\n\nUser:\n^url\n\nIP address:\n^ip\n\nBrowser:\n^browser",
		"feedback_subject" => "^ geri bildirim",
		"flagged_body" => "^p_handle tarafından yazılan mesaj ^flags uyarı aldı:\n\n^open^p_context^close\n\nMesaj görmek için aşağıdaki bağlantıya tıklayınız:\n\n^url\n\n\nTüm mesajları görmek için aşağıdaki bağlantıya tıklayınız:\n\n^a_url\n\n\nTeşekkürler,\n\n^site_title",
		"flagged_subject" => "^site_title uyarılan bir mesaj var",
		"moderate_body" => "^p_handle tarafından gönderilen bir mesaj onayınızı bekliyor:\n\n^open^p_context^close\n\nMesajı onaylamak veya reddetmek için aşağıdaki linke tıklayınız:^url\n\n\nTüm mesajları görmek için aşağıdaki bağlantıya tıklayınız:\n\n^a_url\n\n\nTeşekkürler,\n\n^site_title",
		"moderate_subject" => "^site_title Yönetimi",
		"new_password_body" => "^site_title için yeni şifreniz aşağıdadır.\n\nŞifre: ^password\n\nGiriş yaptıktan sonra bu parolayı değiştirmeniz tavsiye edilir.\n\nTeşekkürler,\n^site_title\n^url",
		"new_password_subject" => "^site_title - Yeni şifreniz",
		"private_message_body" => "^site_title'den ^f_handle tarafından gönderilen mesaj: \n\n^open^message^close\n\n^moreTeşekkürler,\n\n^site_title\n\n\nÖzel mesajları engellemek için, hesabınızın sayfasını ziyaret ediniz:\n^a_url",
		"private_message_info" => "Daha fazla bilgi için ^f_handle:\n\n^url\n\n",
		"private_message_reply" => "^f_handle üyesine cevap vermek için tıklayınız:\n\n^url\n\n",
		"private_message_subject" => "^site_title'den ^f_handle size özel bir mesaj gönderdi.",
		"q_answered_body" => "^site_title 'deki sorunuz ^a_handle tarafından cevaplandı:\n\n^open^a_content^close\n\nSizin sorunuz:\n\n^open^q_title^close\n\nBu cevabı, istiyorsanız en iyi olarak seçebilirsiniz:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		"q_answered_subject" => "^site_title'teki sorunuz cevaplandı",
		"q_commented_body" => "^site_title'teki sorunuz ^c_handle tarafından yorumlandı:\n\n^open^c_content^close\n\nSizin sorunuz:\n\n^open^c_context^close\n\nKendi yorumunuzu ekleyerek yanıt verebilirsiniz:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		"q_commented_subject" => "^site_title'teki sorunuza yeni bir yorum yapıldı",
		"q_posted_body" => "^q_handle tarafından yeni bir soru soruldu:\n\n^open^q_title\n\n^q_content^close\n\nSoruyu görmek için aşağıdaki bağlantıya tıklayınız:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		"q_posted_subject" => "^site_title Yeni bir soru var",
		"reset_body" => "^site_title üye şifrenizi sıfırlamak için tıklayınız:\n\n^url\n\nAlternatif olarak, sağlanan alana aşağıdaki kodu giriniz.\n\nKod: ^code\n\nŞifrenizi sıfırlamak istemediyseniz, bu mesajı dikkate almayınız.\n\nTeşekkürler,\n^site_title",
		"reset_subject" => "^site_title - Şifre Sıfırlama",
		"to_handle_prefix" => "^,\n\n",
		"welcome_body" => "^site_title'e kayıt olduğunuz için teşekkürler ^handle.\n\n^custom^confirmGiriş detaylarınız aşağıdaki gibidir:\n\nE-Posta: ^email\nŞifre: ^password\n\nİleride kullanmak için bu bilgileri saklı tutunuz.\n\nTeşekkürler,\n\n^site_title\n^url",
		"welcome_confirm" => "E-posta adresinizi onaylamak için aşağıdaki bağlantıya tıklayınız.\n\n^url\n\n",
		"welcome_subject" => "^site_title'e Hoş geldiniz!",
		'remoderate_body' => "^p_handle tarafından düzenlenmiş bir mesaj onayınızı bekliyor:\n\n^open^p_context^close\n\nDüzenlenmiş mesajı onaylamak veya silmek için aşağıdakilere tıklayın:\n\n^url\n\n\nSıradaki tüm mesajları gözden geçirmek için aşağıdakine tıklayın:\n\n^a_url\n\n\nTeşekkürler,\n\n^site_title",
		'remoderate_subject' => "^site_title yönetimi",
		'u_registered_body' => "^u_handle adında yeni bir kullanıcı kayıt oldu.\n\nKullanıcı profilini görüntülemek için aşağıdakine tıklayın:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		'u_to_approve_body' => "^u_handle adında yeni bir kullanıcı kayıt oldu.\n\nKullanıcıyı onaylamak için aşağıdakine tıklayın:\n\n^url\n\nOnay bekleyen tüm kullanıcıları gözden geçirmek için aşağıdakine tıklayın:\n\n^a_url\n\nTeşekkürler,\n\n^site_title",
		'u_registered_subject' => "^site_title yeni bir kayıtlı kullanıcıya sahip",
		'u_approved_body' => "Yeni kullanıcı profilini buradan görüntüleyebilirsiniz:\n\n^url\n\nTeşekkürler,\n\n^site_title",
		'u_approved_subject' => "^site_title kullanıcınız onaylandı",
		'wall_post_subject' => "^site_title duvarınıza yazın",
		'wall_post_body' => "^f_handle ^site_title sitesinde duvarınıza yazdı:\n\n^open^post^close\n\nBu mesaja buradan cevap yazabilirsiniz:\n\n^url\n\nTeşekkürler,\n\n^site_title",
	);
	

/*
	Omit PHP closing tag to help avoid accidental output
*/