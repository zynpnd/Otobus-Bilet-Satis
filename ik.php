<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div>
        <div class="uk-container">
            <div class="uk-grid-match" uk-grid>
                <form >
                    <div class="uk-margin" uk-grid>
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input" type="text" name="name" placeholder="İsim">
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input" type="text" name="surname" placeholder="Soyisim">
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input class="uk-input" type="text"name="email" placeholder="E-posta">
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: phone"></span>
                                <input class="uk-input" type="text"name="phone" placeholder="Telefon">
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: location"></span>
                                <input class="uk-input" type="text"name="city" placeholder="Yaşadığınız Şehir">
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <div uk-form-custom="target: > * > span:first-child" class="uk-width-1-1 uk-text-left">
                                <select name="career">
                                    <option value="">Başvurduğunuz Pozisyon</option>
                                    <option value="1">pazarlama sanatçısı</option>
                                    <option value="1">video grafiker</option>
                                    <option value="2">grafiker</option>
                                    <option value="3">kurumsal iletişim uzmanı</option>
                                    <option value="4">mobil uygulama geliştirici</option>
                                    <option value="4">müşteri temsilcisi</option>
                                </select>
                                <span class="uk-form-icon" uk-icon="icon: thumbnails"></span>
                                <button class="uk-button uk-button-default uk-width-1-1 uk-text-left" type="button" tabindex="-1">
                                    <span class="uk-width-1-1 uk-margin-small-left uk-text-capitalize"> </span>
                                    <span uk-icon="icon: chevron-down" class="uk-float-right uk-margin-small-top"></span>
                                </button>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-2@m">
                            <div uk-form-custom="target: > * > span:first-child" class="uk-width-1-1 uk-text-left">
                                <select name="pay">
                                    <option value="">Maaş Beklentiniz</option>
                                    <option value="1">2.000₺ - 3.000₺-</option>
                                    <option value="1">3.000₺ - 4.000₺</option>
                                    <option value="2">4.000₺ - 5.000₺</option>
                                    <option value="3">5.000₺ - 7.000₺</option>
                                    <option value="4">7.000₺ - 10.000₺</option>
                                    <option value="4">10.000₺ ve üstü</option>
                                </select>
                                <span class="uk-form-icon" uk-icon="icon: thumbnails"></span>
                                <button class="uk-button uk-button-default uk-width-1-1 uk-text-left" type="button" tabindex="-1">
                                    <span class="uk-width-1-1 uk-margin-small-left uk-text-capitalize"> </span>
                                    <span uk-icon="icon: chevron-down" class="uk-float-right uk-margin-small-top"></span>
                                </button>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-2@m">
                            <div class="uk-inline uk-width-1-1">

                                <div class="uk-margin" uk-margin>
                                    <div class="uk-width-1-1" uk-form-custom="target: true">
                                        <span class="uk-form-icon" uk-icon="icon: thumbnails"></span>
                                        <input type="file">
                                        <input class="uk-input" type="text" placeholder="Cv Yükleyiniz" name="cv" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-position-absolute uk-flex-top uk-margin-small-top" uk-icon="icon: pencil"></span>
                                <textarea class="uk-textarea" style="padding-left: 35px;padding-top: 10px" rows="5" placeholder="Detaylı Açıklama..." name="content"></textarea>
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <div class="uk-inline uk-width-1">
                                <label><input class="uk-checkbox" type="checkbox"> <a class="customLink" href="#">Hükümler ve
                                        koşulllar</a> Kabul Ediyorum</label>
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <div class="uk-text-center">
                                <button class="uk-button uk-button-default customButtonReverse uk-width-1-1" type="submit">
                                    <span class="uk-h4 uk-text-bold">Gönder</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


$query = $db->prepare("INSERT INTO  ik SET name=:name,
                                                surname=:surname,
                                                email=:email,
                                                phone=:phone,
                                                city=:city,
                                                career_id=:career_id,
                                                pay=:pay,
                                                cv=:cv,
                                                content=:content);