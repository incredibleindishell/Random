
# Exploiting Reflected Cross Site Scripting when "Referer" header value renders on web page

# Why This Code
This sample code is vulnerable to "Referer" based Cross-Site-Scripting i.e if application is rendering the value of from "Referer" request header, how to trigger reflected Cross Site Scripting in that case.

## Scenario
When web application render the value of "Referer" header from user request, Reflected Cross-Site-Scripting can be performed.
Generally, the basic test case to demonstare this type of Cross-Site-Scripting is: 

	1) Intercepting the user request in proxy like Burp
	2) Adding Cross-Site-Scripting payload in the "Refrer" header field and then forwarding it to demonstrate the Reflected Cross-Site-Scripting.

But due to this approach, web application owner does not consider it harmfull.

# How to demonstrate such Cross-Site-Scripting just like normal Reflected Cross-Site-Scripting

I figured out a way to trigger such Cross-Site-Scripting without performing "Intercept user request and modify value of Referer Header Value".

To perform "Referer" header based XSS, i have HTML file (trigger.html) which will contain link to web page which is rendering value of "Refrer" header on it.

One need to host that HTML page (trigger.html) so that when attacker give link to the victim, it's accesibel to victim.

In my case, i have hosted this HTML code (trigger.html) on "http://localhost" and application which is vulnerable to "Refrer" based Cross-Site-Scripting is hosted on domain "http://ica/lab"

Attacker need to craft the link in below mentioned manner 

	http://localhost/trigger.html?XSS_payload_come_here
	Example:
	http://localhost/trigger.html?<script>alert(document.domain)</script>

Now, attacker need to forward this link to victim, and when victim will visit the above mentioned URL, JavaScript code inside trigger.html will redirect user to the vulnerble domain web page which renders the value of "Referer" header on the page. 

When redirection will be completed, Application will print the value "http://localhost/trigger.html?<script>alert(document.domain)</script>" on web page which will lead to normal Reflected Cross-Site-Scripting.

## Reference Screenshots

Vulnerable PHP Code

![php](https://raw.githubusercontent.com/incredibleindishell/Random/master/Refere_based_XSS/images/vulnerable.png)

HTML file JavaScript code which will redirect user to domain vulnerable to "Referer" header based Cross-Site-Scripting.

![html](https://raw.githubusercontent.com/incredibleindishell/Random/master/Refere_based_XSS/images/trigger.html.png)

Sample response of the vulnerable web page

![sample response](https://raw.githubusercontent.com/incredibleindishell/Random/master/Refere_based_XSS/images/sample%20referer.png)

Cross-Site-Scripting payload crafted HTML page link

![crafted Link](https://raw.githubusercontent.com/incredibleindishell/Random/master/Refere_based_XSS/images/crafted.png)

Reflected Cross-Site-Scripting payload executed on domain which renders the value of "Referer" Header.

![Executed](https://raw.githubusercontent.com/incredibleindishell/Random/master/Refere_based_XSS/images/ref%20vulnerable%20xss.png)

--==[[ Greetz To ]]==-- 

Guru ji zero ,code breaker ica, root_devil, google_warrior,INX_r0ot,Darkwolf indishell,Baba, 
Silent poison India,Magnum sniper,ethicalnoob Indishell,Reborn India,L0rd Crus4d3r,cool toad, 
Hackuin,Alicks,mike waals,cyber gladiator,Cyber Ace,Golden boy INDIA,d3, rafay baloch, nag256 
Ketan Singh,AR AR,d2,saad abbasi,Minhal Mehdi ,Raj bhai ji ,Hacking queen,lovetherisk,Bikash Dash 

--==[[ Love To ]]==-- 

My Father ,my Ex Teacher,cold fire hacker,Mannu, ViKi ,Ashu bhai ji,Soldier Of God, Bhuppi, 
Mohit,Ffe,Ashish,Shardhanand,Budhaoo,Jagriti,Salty, Hacker fantastic, Jennifer Arcuri and Don(Deepika kaushik)
