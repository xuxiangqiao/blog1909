<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091900549697",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAiE4buKz33SDhN5BgnVdPrfE58sEoI9E1sxDfJkrQY7QtmPP5fsNrhjUdRmwSFILccu3C39E+FFnKpC9CkPxTU8qQuxypwB4JQHwkh+e1kNo+/oGC9SgQui/451dquEskD/U3ISPphnmwjY/7fyzPOXzbNlQ2pyG/KkOa6HaGDPQRHFWwj2o2TKMUJnk3QLWmVYXw7LkR74wxMRQUNGZziEfyiLiK3hofCPUYJnVGWbgIkSB+6kxxg279nUx07RnxFDoEw1gg8fQVmsCNWoFSfmOpSi59s850RhDstj6KhFYRStydlcwyS42iqatKNM1hDH1m+WYJhrw2QmYNnfDq/wIDAQABAoIBAAqxxi8JMzFgYQtRAqOVtCS7poZLbXDR+1qfWkLQ3+TSwDkd+1dc0dTn2fIqjIibc9x4ly+kZTCHkwSqyJhDk+4hGJX1u8PdF3C9zMf1ACPrW8HwO2wsxpM1LFxKWY84Jg4yeS7aeHoaliWlRGBIDcI+75wlo1wdo7gXMdJHamEdr3u0MXwIF3l7xCSTyq2EsQPYIsqxp6WJZcMqpB1hxerGcf57U5fbnEjq6+FXIPdqygWSyOYOnJl8yLDOvqC0JFFPrzKCotmbLNWcNGbwdKGQBBS5GGbymlotfgMB7/wq3voQpplG9ACYr5hRY9sdReQGW+OPKZYiUktVFIhNydECgYEA3EdOmwaGWH37LqgSJv+E2cD+neabmXsyoxeqNN3GgSVu025+6lzE/DAIK+Uena1UtUEGS10F1uYOz60TMzd5gsJ5UOIKq6RNamkWTCPBcuGL0GUIu3tOTx/Erlft1wjLEwjPBwTK4aDAsJY0XvwH4JwNPr0VLwub3eTWYGB8j7sCgYEAnmi1ky7/X3ipzpM3Z9Abqc2GsflyfPm5elsccOlmVFZ7rzycf5ZhxlGL/9ugBz1gkLsaLYkePprqxmdXDo6OW4cGFEGY3b4RFuRYZ+P2XGAr52VWfjX2EsoaDMGw1qBXjpdOLWv8kk7C+pbZyQscekz6Xhu0EeDLSgtYhT4is40CgYBW5u7U7CMOQE1bH8Vhi0bfHWuV4cebKmZUv15P0vqgMqNhWGNLlGPGVjCzGIYWkK4tf8S68K0AFezb85zyhL00YAK6bSLmikBcba71RNnpt5+QDHwAcun2/0J5wYi8X+S10rDSRQrBLsk2IVvx6R42d3omOTRlRgAs7z2/8fDSRwKBgCzan1duvlbNNt/MZarajYq2LIamiFmE6JURyWrbW+NTnbAP7IxgC415N7gZ+yUxpu80W4Q7SDoX6ZSGXGs9yGd4QytnK57WG8asn6/DJ9YeUTAzTJtuMiA948Rq7+TGACTbCQLpidnvvVvxbPd1Uvn6ZAZTt9g8G7P6pHUOFAtdAoGBAMJSbMbEnggDl59X3jOb7u18aJSggm1M1BwOPLhcx36GfhdCBaR00DTrlHTIoi9kSdC1+PlDxatvvFqDs2+ur3D9cSqQYsbeLFUr8/VC2D/U26zcYYr1WS73L4fJ9nZ9PAIMwymeywnZ7yMmJdKJp4LT+6M8hnME5lZGjVE30o7f",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0QC5/O5zZT6DvbCjI7QVUAxqwA+Kh4y8tdz5Vpti/IoCL+aWdLL1Z8iXDwywUpbKR6rCeSEegIklzze2dCl1H4TaI3rFBdyzBB1UV1WNhLTMhssKxQ9c4lcB3U32SoBu4+/0wOb78YXViwYIterrxRPis8T73WKTi2hB1cB/FHxtZ3Huzbc1S1yc1KAgt9vUNR4Wb/3jyUi7SCnP6EMf/l1F+/mqhaRgq8d1zh7P388I57eDWZCdMB8lUq6n8Bn9+uDhJhvpp79YnyJsORSfsxDL+NZ2J8ziuETNhQxX/v2zFp6I75nDIUqynpGCe40/0L9KMtkv2Tn2l24AwnxU7QIDAQAB",
		
	
);