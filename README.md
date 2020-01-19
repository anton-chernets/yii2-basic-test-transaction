<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

    ```
    Есть набор данных, нужно написать систему, которая:
    Будет подготавливать данные из $data.
    Система должна уметь распознавать все 3 варианта ответа:
    Имитировать отправку данных (CURL).
    Получение ответа.
    Определение статуса (в зависимости от ответа).
    
    
    
    $data = [
    "firstName" => "Vasya",
    "lastName" => "Pupkin",
    "dateOfBirth" => "1984-07-31",
    "Salary"    	=> "1000",
    "creditScore" => "good"
    ];
    
    1) формат отправки
    XML Request
    <?xml version="1.0"?>
    <userInfo version="1.6">
    <firstName></firstName>
    <lastName></lastName>
    <salary></salary>
    <age></age>
    <creditScore></creditScore>
    </userInfo>
    
    creditScore map (подменяем данные при отправке по этой карте):
    good - 700
    bad   - 300
    
    Response examples:
    Sold:
    <?xml version="1.0" encoding="UTF-8"?>
    <userInfo version="1.6">
      <returnCode>1</returnCode>
      <returnCodeDescription>SUCCESS</returnCodeDescription>
      <transactionId>AC158457A86E711D0000016AB036886A03E7</transactionId>
    </userInfo>
    
    Reject:
    <?xml version="1.0" encoding="UTF-8"?>
    <userInfo version="1.6">
      <returnCode>0</returnCode>
      <returnCodeDescription>REJECT</returnCodeDescription>
    </userInfo>
    
    Error:
    <?xml version="1.0" encoding="UTF-8"?>
    <userInfo version="1.6">
      <returnCode>0</returnCode>
      <returnCodeDescription>ERROR</returnCodeDescription>
      <returnError>Lead not Found</returnError>
    </userInfo>
    
    
    2) формат отправки
    JSON Request
    
    
    {"userInfo":{"firstName":"Vasya","lastName":"Pupkin","dateOfBirth":"1984-07-31","Salary":"1000","creditScore":"good"}}
    
    Response examples:
    Sold:
    {"SubmitDataResult":"success"}
    
    Reject:
    {"SubmitDataResult":"reject"}
    
    Error:
    {"SubmitDataResult":"error", “SubmitDataErrorMessage”:“”}
    ```