@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
     
<div class="container">
                              <div class="col-lg-12">
	<div class="panel panel-default">
			
																<div class="row">
			     	<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">Subject</div>
							<div class="panel-body">
						  		<form method="POST" action="/pems/qandalive" accept-charset="UTF-8"><input name="_token" type="hidden" value="XzJg3zha6BPgUkMYkd1XqHNXcAfeB3axbWRB0BBn">
						  			
						  			<label for="subjectid"> Select Subject</label>
						  			<select id="subjectid" name="subjectid"><option value="0">Select a Subject</option><option value="1" selected="selected">Financial Accounting</option><option value="2">Management Accounting</option><option value="3">Business Maths And Quantitive Methods</option><option value="4">Economics</option><option value="5">Information Technology</option><option value="6">Business Law</option><option value="7">Audit</option><option value="8">Taxation</option><option value="9">Advanced Accountancy</option><option value="10">Project Management</option><option value="12">Pm Body Of Knowledge</option><option value="14">Project Accounting</option><option value="15">Performance Management</option><option value="16">Decision Making Management</option><option value="17">Risk And Control Management</option><option value="18">Strategic Business Planning</option><option value="19">Strategic Financial Planning</option><option value="20">Strategic I.C.T. Planning</option><option value="21">Mock Exam</option></select>
						  									  			
						  			<input class="btn btn-default" type="submit" value="Choose">
                                      
						  		</form>
						  		<a href="/pems/1/addquestion" class='btn btn-default'>Add Question</a>

						  		
						 </div>
					</div> 
					
					</div>


										<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">Questions</div>
							<div class="panel-body">
						  		<form method="POST" action="/pems/qandalive/1/showonlinequestions" accept-charset="UTF-8"><input name="_token" type="hidden" value="XzJg3zha6BPgUkMYkd1XqHNXcAfeB3axbWRB0BBn">
						  			
						  			<label for="questionid"> Select Question</label>
						  			
						  			<select style="width:300px;" id="questionid" name="questionid"><option value="0">Select a Question</option><option value="5434" selected="selected">1 - What is Double Entry? </option><option value="5435">2 - Which of the following statements is correct?</option><option value="5436">3 - In Accounting, the term &#039;Purchases&#039; means...</option><option value="5437">4 - What is a Trial Balance?</option><option value="5438">5 - Which of the following is an asset of a firm?</option><option value="5439">6 - Which of the following is a liability of a firm?</option><option value="5440">7 - Which of the following equations is correct?</option><option value="5441">8 - Which of the following is correct?</option><option value="5442">9 - The following is a list of assets and liabilities of a firm as at 31st Jan.

Premises owned by the firm                            20,000
Money owed by the firm to its creditors              3,000
Stock owned by the firm                                   8,500
Loan received by the firm from a bank                4,000
Cash in the firm&#039;s safe                                         100

The firm&#039;s capital at that date is...</option><option value="5443">10 - When a firm pays one of its creditors by cheque, the effect on its assets and liabilities is to...</option><option value="5444">11 - When a firm lodges money, which it received from one of it&#039;s debtors, the effect on its assets and / or liabilities is...</option><option value="5445">12 - The effect on a firms assets and / or liabilities, as a result of it being granted a bank loan and the amount of the bank loan being transferred into its bank current account is...</option><option value="5446">13 - The effect on a firms assets and / or liabilities as a result of it buying goods for resale on credit is...</option><option value="5447">14 - Which of the following possible double-entries is correct?</option><option value="5448">15 - A school bought a computer, which it intended to use for general administration, and paid for it by cheque. Which of the following double-entries is the correct way to record this transaction?</option><option value="5449">16 - If there is a seperate ledger account for each debtor and for each creditor, which of the following double-entries is the correct way to record the lodgement of money received from P Doyle, a debtor?</option><option value="5450">17 - Which of the following double-entries is the correct way to record the lodgement of new capital into a firms bank account?</option><option value="5451">18 - If there is a seperate ledger account for each debtor and each creditor, which of the following double-entries is the correct way to record a cheque paid to B Lee, a creditor?</option><option value="5452">19 - A newsagents total sales includes the value of...</option><option value="5453">20 - Which of the following double-entries is the correct way to record the sale of goods, on credit, to R Webb?</option><option value="5454">21 - In the accounts of K Bryan, which of the following double-entries is the correct way to record goods returned by S James, a credit customer?</option><option value="5455">22 - In the accounts of S James, which of the following double-entries is the correct way to record goods returned by K Bryan, a credit customer?</option><option value="5456">23 - In the accounts of W Balfe, which of the following double-entries is the correct way to record goods purchased from D Connolly and paid for immediately in cash?</option><option value="5457">24 - Which of the following double-entries is the correct way to record goods returned to A Miller, a supplier?</option><option value="5458">25 - In the case of a Sole Trader...</option><option value="5459">26 - In the case a of a retail garage, which of the following double-entries is the correct way to record the lodgement of hire purchase commission received as a result of selling cars?</option><option value="5460">27 - In the case of a DIY store, which of the following double-entries is the correct way to record the payment of rates for the current acounting period by cheque?</option><option value="5461">28 - In the case of a retail garage, which of the following double-entries is the correct way to record the payment, by cheque, of an electricity bill for the current accounting period?</option><option value="5462">29 - What is the balance Carried Down on the following account on the 31st May?

                                               P Kelly
-----------------------------------------------------------------------------------------------------------
May 01  Sales                                 205 | May 17 Bank                    300
May 14  Sales                                 360 | May 28 Returns Inwards      50
May 31  Sales                                 180 | </option><option value="5463">30 - What would the balance Brought Down, on J Barker&#039;s account, be if it was balanced on the 19th June?

                                      J Barker
--------------------------------------------------------------------------------------------
June 02   Sales               200| June 15   Bank                    330
June 12   Sales               650| June 25   Returns Inwards      75
June 30   Sales               800| </option><option value="5464">31 - Recording a single transaction in the double-entry accounting records may...</option><option value="5465">32 - Which of the following transactions, on its own, could explain an increase in the debit balance Brought Down on the bank account in a firm&#039;s ledger?</option><option value="5466">33 - A firm&#039;s trial balance...</option><option value="5467">34 - The purpose of a firm preparing a trial balance is to establish whether...</option><option value="5468">35 - The debit and credit totals of a trial balance...</option><option value="5469">36 - An error of omission arises when...</option><option value="5470">37 - An error of commission arises when...</option><option value="5471">38 - In the case a newsagent&#039;s shop, which of the following is an error of principle?</option><option value="5472">39 - An error of original entry occurs when...</option><option value="5473">40 - Which of the following is prepared in order to determine a firm&#039;s net profit (or net loss) for an accounting period?</option><option value="5474">41 - If the total of a firm&#039;s sales for the month of May is 300,000 and its gross profit is equal to 25% of its cost of sales, the value of its cost of sales for May was...</option><option value="5475">42 - The following information relates to a firms trading during the month of June...

Gross profit for the month                                 35,000
Expenses for the month                                   18,000

Net profit for the month equals 17% of the sales for the month

The firms cost of sales for the month of June is...</option><option value="5476">43 - If a sole trader&#039;s capital at the beginning of a year was 100,000 and his net profit for the year was 20,000, his capital at the end of the year...</option><option value="5477">44 - A balance sheet is...</option><option value="5478">45 - The correct heading for the balance sheet of J Burton at the end of December 2000 is...
&quot;Balance Sheet of J Burton...</option><option value="5479">46 - The balance sheet of a firm as at any particular date is intended to show...</option><option value="5480">47 - A firms fixed assets are...</option><option value="5481">48 - A firms current assets are...</option><option value="5482">49 - When preparing a firms balance sheet, which of the following should be classified as a long-term liability?</option><option value="5483">50 - A firms current liabilities, at its balance sheet date, are...</option><option value="5484">51 - Categorise the three items below as either &quot;Current Liabilities&quot; or &quot;Long-term liabilities&quot; of a firm as at 31st December 2000 and choose the option which correctly categorises all three items.

Item 1
A bank loan repayable by the firm as a single sum on 31st March 2002
Item 2
An electricity bill relating to November and December 2000 but unpaid as at 31st December 2000, because the bill was not received by the firm until 10th January 2001, at which time it was recorded in the appropriate ledger accounts.
Item 3
The portion of a five year bank loan due to be paid by the firm in 2001. The loan was taken out on 1st January 1999 and is repayable in equal annual instalments over the term of the loan.</option><option value="5485">52 - The following information relates to a sole trader...

Total of all assets at 1st June        2,300
Total of all liabilities at 1st June     2,500
Net profit earned during June         1,000
Capital introduced during June       5,000
Drawings during June                      700

The sole traders capital at the 30th June was...</option><option value="5486">53 - Which of the following summarised balance sheets are correct?

                                  Firm 1    Firm 2    Firm 3
----------------------------------------------------------------------
Current Assets                 100     2,517     2,781
Capital                          1,068     2,000        719
Long-Term Loan                 nil        500        300
Current Liabilities              375     1,315        950
Fixed Assets                    440     1,298        812
</option><option value="5487">54 - A sole traders capital at any particular date is equal to...</option><option value="5488">55 - A firm which sells exclusively on credit has the four current assets listed below.
Which of the lists shows these assets in decreasing order of liquidity i.e. starting on the left with the most liquid (most readily convertible into cash) of the four and ending on the right with the least liquid (least readily convertible into cash)?</option><option value="5489">56 - On 1st January a sole trader had capital of 25,000. During the year, he withdrew 23,000 for his own use and, at 31st December, he had capital of 31,000.
If he did not introduce any new capital during the year, his net profit for the year was...</option><option value="5490">57 - Which of the following pairs of events would increase the capital of a firm?</option><option value="5491">58 - Carriage inwards is included in the cost of sales calculations because...</option><option value="5492">59 - The following information concerns a retailing firm...

Sales during July                               8,200
Purchases during July                        6,400
Stock at 1st July                               1,300
Stock at 31st July                                900
Carriage inwards on July purchases       200

The firm&#039;s cost of sales for July is...</option><option value="5493">60 - The cost incurred by a firm of bringing goods to a merchantable condition should be included in...</option><option value="5494">61 - The following data relates to a firm which has been trading for several years.
                                                 2000                       1999
Sales                                  1,000,000                  900,000
Cost of Sales                          500,000                  480,000
Stock at 31st December          200,000                  150,000

Assuming that the firm&#039;s cost of sales is calculated by reference to its purchases and stock figures only, the total of its purchases during 2000 was...</option><option value="5495">62 - A sole trader incurred a loss of 10,000 during his most recent accounting period, yet had more money in his bank account at the end of the period than he had at the beginning of it.
Which of the following, on its own, could explain this?</option><option value="5496">63 - The correct way to record stock taken by the proprietor of a firm for his own personal use, without him paying for it, is...</option><option value="5497">64 - The proprietor of a firm took some of the firm&#039;s stock for his own use without paying for it. As he considered this to be his &quot;right&quot;, he did not record the transaction. The result of this is that, when final accounts are prepared for the firm...</option><option value="5498">65 - If, in the accounts of a sole trader, 2,500 was debited to the purchases account, instead of being debited to the drawings account...</option><option value="5499">66 - Tom set up business on the 1st January.
He bought fixed assets costing 53,000 and stock costing 6,600. He had financed these in advance of commencing business with a personal loan of 25,000 from his brother and a business loan from a bank. On the 31st December of the same year his net assets totalled 37,200. His net profit for the year was 21,100
Tom&#039;s drawings during the year were...</option><option value="5500">67 - The value of a firm&#039;s stock at the end of an accounting period is found by...</option><option value="5501">68 - When preparing the financial statements of an entity, the going concern concept should be applied, only if the entity concerned...</option><option value="5502">69 - The going concern concept means that, when preparing accounts...</option><option value="5503">70 - The entity concept means that...</option><option value="5504">71 - The effect of the accruals concept is that...</option><option value="5505">72 - The accruals concept...</option><option value="5506">73 - An accounting period is ...</option><option value="5507">74 - The effect of the prudence concept is that...</option><option value="5508">75 - The consistency concept means that...</option><option value="5509">76 - Which of the following is one of the &quot;fundamental accounting concepts&quot; referred to in SSAP 2 - Disclosure of accounting policies&quot;.</option><option value="5510">77 - According to &quot;SSAP 2 - Disclosure of Accounting policies&quot;...</option><option value="5511">78 - Which of the fundamental accounting concepts (listed below) is sometimes referred to as the matching concept.</option><option value="5512">79 - Which of the following is a &quot;Book of Original Entry&quot;?</option><option value="5513">80 - Which of the following are entered in the purchases journal (otherwise known as the Purchases Daybook)?</option><option value="5514">81 - Which of the following is a personal account?</option><option value="5515">82 - The nominal ledger (also known as the general ledger) is...</option><option value="5516">83 - &quot;Posting&quot; means...</option><option value="5517">84 - A current account is...</option><option value="5518">85 - A deposit account is...</option><option value="5519">86 - A bank cheque...</option><option value="5520">87 - Cheques are sometimes &quot;crossed&quot;...</option><option value="5521">88 - Endorsing a cheque means...</option><option value="5522">89 - A paying-in slip is...</option><option value="5523">90 - The &quot;drawer&quot; of a cheque is...</option><option value="5524">91 - The &quot;payee&quot; of a cheque is...</option><option value="5525">92 - A bank overdraft...</option><option value="5526">93 - An employee of a video/dvd store went to a bank and lodged the previous night&#039;s takings, held overnight in the firm&#039;s safe.
This transaction should be recorded in the store&#039;s Cash Book as...</option><option value="5527">94 - A 200 credit balance brought down on the cash column of a firm&#039;s cash book means that...</option><option value="5528">95 - a 100 debit balance brought down in the cash column of a firm&#039;s cash book means that...</option><option value="5529">96 - Cash discount allowed (also known as settlement discount allowed) to a customer means that the customer is entitled to pay less than the full amount he owes...</option><option value="5530">97 - Cash discount (also known as settlement discount) received is...</option><option value="5531">98 - The total of the discount allowed column in the cash book should be posted to...</option><option value="5532">99 - The sales journal is commonly known as...</option><option value="5533">100 - The sales daybook is used to record...</option><option value="5534">101 - Which of the following statements is true?</option><option value="5535">102 - Which of the following best describes management accounts.</option><option value="5536">103 - Which of the following best explains why employees are interested in the financial statements of their employer?</option><option value="5537">104 - Which of the following user groups require the most detailed financial information?</option><option value="5538">105 - Which of the following statements are true?</option><option value="5539">106 - The main aim of financial accounting is to </option><option value="5540">107 - Which of the following sentences does NOT distinguish between management accounts and financial accounts?</option><option value="5541">108 - The IFR advisory council (IFRs AC) are responsible for 

1 Issuing guidance in relation to emerging issues

2 Advising the IASB on major standard-setting projects.</option><option value="5542">109 - Which of the following assumptions underline the Framework for the presentation and preparation of financial statements?</option><option value="5543">110 - Which of the following are true?

1  International accounting standards are effective only if adopted by regulatory bodies.

2  Accounting standards provide guidance on accounting for all types of transaction.</option><option value="5544">111 - Which of the following statements is correct In times of rising prices, the use of LIFO inventory valuation tends to result in a high valued inventory and to overstated profits. The prudence concept will not result in overstated assets and understated liabilities. To comply with the law, the legal form of a transaction must always be reflected in the financial statements. If a non-current asset initially recognised at cost is re-valued, the surplus must be credited in the statement of cash flows.</option><option value="5545">112 - Which of the following characteristics of financial information contribute to reliability according to the IASB&#039;s Framework for the Preparation and Presentation of Financial Statements?

1. Completeness
2. Prudence
3. Neutrality
4. Faithful representation
5. None of the above</option><option value="5546">113 - A statement of cash flows prepared in accordance with indirect method reconciles profit before tax to cash generated from operations.

Which of the following lists of items consists only of items that would be ADDED to profit before tax?

Loss on sale of non-current assets, depreciation, increase in receivables.
Decrease in depreciation, inventory, profit on sale of non-current assets.
Decrease in receivables, increase in payables, loss of non-current assets.
Decrease in receivables, increase in payables, profit on sale of non-current assets.</option><option value="5547">114 - The accounting cencept which dictates that non-current assets should be valued at cost less accumulated depreciation, rather than at their enforced saleable value, is 

</option><option value="5548">115 - Inventories should be valued at the lower of cost and net realisable value. Which one of the following accounting concepts governs this?</option><option value="5549">116 - Which of the following pairs of accounting concepts are most likely to be in conflict with one another?

Relevance and reliability
Comparability and understandability
Accruals basis and going concern 
Comparability and reliability
Comparability and going concern</option><option value="5550">117 - Why should financial statements be prepared on a consistent basis?</option><option value="5551">118 - Which one of the following is NOT an aspect of the reliability of financial information? </option><option value="5552">119 - Which of the following are capital items expenditure?

1. Purchases of cars for the use of sales personnel.
2. Construction of an extension to the Head office building.
3. The cost of redecorating offices.
4. Purchases of new plant machinery.</option><option value="5553">120 - Who issues International Financial Reporting Standards?</option><option value="5554">121 - Which of the following statements about Framework are true?

1. The Framework is an accounting standard.
2. It assists in harmonising accounting practice.
3. It assists national standard setters in developing national standards.
4. It assists users of the accounts to interpret financial statements.</option><option value="5555">122 - International accounting standards are written primarily with regard to the information needs of which type of users.</option><option value="5556">123 - Which of the following statements are correct?

1. Prudence requires that expenses should never be over-stated in the financial statements.

2. Complex items should not be excluded from the financial statements on the grounds that they would not be understandable for many users.

3. The going  concern assumption is that the business entity will continue in operation for the forseeable future.

4. Prudence requires that all expenses be over-stated in the financial statements.</option><option value="5557">124 - Which of the following is an example of liability?</option><option value="5558">125 - Which of the following arguments is not in favour of accounting standards, but is in favour of accounting choice?</option><option value="5559">126 - The main aim of accounting is to</option><option value="5560">127 - The main aim of financial accounting is to </option><option value="5561">128 - Financial statements differ from management accounts in that they</option><option value="5562">129 - Which one of the following does not apply tothe preparation of financial statements?</option><option value="5563">130 - Which of the following statements gives the best definition of the objective of accounting?</option><option value="5564">131 - The responsibility for ensuring that all accounting transactions are properly recorded and summarised in the accounts lies with...</option><option value="5565">132 - Gross profit from 2011 can be calculated from...</option><option value="5566">133 - The capital of a sole trade would change as a result of...</option><option value="5567">134 - The &quot;accounting equation&quot; can be rewritten as...</option><option value="5568">135 - An increase in inventories of $5,00, a decrease inthe bank balancs of $800 and an increase in payables of $24,000 results in ...</option><option value="5569">136 - The accounting equation can change as a result of certain transactions. Which one of the following transactions would not affect the accounting equation?</option><option value="5570">137 - The profit of a business may be calculated by using which one of the following formulae?</option><option value="5571">138 - If, at the end of the financial year, a company makes a charge against the profits for stationery consumed but not yet invoiced, this adjustment is in accordance with the convention of...</option><option value="5572">139 - You are  the accontant of GSM Ltd and have extracted a trial balance at 30th September 2011.The sum of the debit column of the trial balance exceeds the sum of the credit column by $829. A suspense account has been opened to record the difference. After preliminary investigations failed to locate any errors you have decided to prepare the draft financial statements in accordance with the prudence convention.

The suspense account balance would be treated as...</option><option value="5573">140 - A fair presentation is one that...</option><option value="5574">141 - Which of the following items are items of capital expenditure?

1. Purchase of property.
2. Short term hire of machinery.
3. Computer repairs.
4. Long term car hire for sales staff.</option><option value="5575">142 - Your company sells goods on 29 December 2011 on sale or return; the final date for return or payment in full is 10 January 2012. The costs of manufacturing the product are all incurred and paid for in 2011 except for an outstanding bill for carriage outwards that is still unpaid.

The associated revenues and expenses of the transaction should be dealt with in the income statement by...</option><option value="5576">143 - Which of the following would result in a debit entry in an expense account?</option><option value="5577">144 - If the owner of a business takes goods from inventories for his or her own personal use, the accounting convention to be considered is ...</option><option value="5578">145 - Sales revenue should be recognised when goods and services have been supplied; costs are incurred when goods and services have been received.

The accounting convention that governs this is...</option><option value="5579">146 - The capital maintenance convention implies that...</option><option value="5580">147 - The owner of a business invests $80,000 in he business. Which elements of the accounting equation will be affected by this transaction?</option><option value="5581">148 - The accounting convention that dictates that non-current assets should be valued at cost, less accumulated depreciation, rather than their enforced saleable value, is...</option><option value="5582">149 - Goodwill is most appropriately classed as...</option><option value="5583">150 - A major aim of the internal auditors is to...</option><option value="5584">151 - Which one of the following is not a necessary part of the stewardship function?</option><option value="5585">152 - Who issues International Financial Reporting Standards.</option><option value="5586">153 - Which of the following is not an accounting convention?</option><option value="5587">154 - When preparing fiancial statements in periods of inflation, directors...</option><option value="5588">155 - Which of the following statements is correct?</option><option value="5589">156 - What is an audit trail in a computerised accounting system?</option><option value="5590">157 - The concept of capital maintenance is important for...</option><option value="5591">158 - Internal control includes &#039;detect&#039; controls and &#039;prevent&#039; controls. Which of the following is a detect control?</option><option value="5592">159 - Which of the following statements is not correct?</option><option value="5593">160 - The fundamental objective of an external audit of a limited company is to...</option><option value="5594">161 - Which of the following statements closely matches the meaning of fair representation?</option><option value="5595">162 - Fair representation is largely determined by compliance with IFRSs.</option><option value="5596">163 - A company includes in inventories goods received before the year end, but for which invoices are not received until after year end. This is in accordance with...</option><option value="5597">164 - The following information relates to the sole trader business of Logatech.

                                                                                                                 $
Net assets at 31 2011Oct                                                                187,500
Capital introduced during the year to 31 Oct 2011                         52,500
Profits in the year                                                                             1 27,800
Drawings in the year                                                                         107,700

What was the balance on Logatech&#039;s capital account on 1 November 2010?</option><option value="5598">165 - Which of the following is not a reason for providing depreciation on tangible non-current assets?</option><option value="5599">166 - Which of the following is incorrect?</option><option value="5600">167 - The purchase of a business for more than the aggregate of the fair value of its separable identifiable assets results in the creation of a...</option><option value="5601">168 - Management accounts differ from published financial statements because they...</option><option value="5602">169 - The fundamental objective of an external audit of a limited company is to ...</option><option value="5603">170 - Which of the following statements most closely expresses the meaning of a &quot;fair presentation&quot;?</option><option value="5604">171 - Which one of the following statements does not give the correct demarcation between the financial statements and management accounts?</option><option value="5605">172 - Which of the following statements best describes the consistency concept?</option><option value="5606">173 - Ainsley Co decides to change its accounting policy following the issue of a new IFRS. The IFRS includes provision for accounting for transitional changes.

How should it account for the change in policy?</option><option value="5607">174 - Which of the following assumptions are included in IAS 1?</option><option value="5608">175 - Which of the following make use of double entry accounting method?</option><option value="5609">176 - Making an allowance for receivables is an example of which concept?</option><option value="5610">177 - Why is a conceptual fremework necessary?</option><option value="5611">178 - Which of the following sections are not included in the IASB&#039;s framework?</option><option value="5612">179 - What is an accounting suite?</option><option value="5613">180 - Which of the following sentences does not explain the distinction between financial statements and management accounts?</option><option value="5614">181 - {Question Required}</option><option value="5615">182 - Wilkinson runs a sole trader business selling computers. On 12 December 2011, he employed his daughter as an administrator for the business and took a computer from the store room for her to use in the office. 

What is the double entry for this transaction?</option><option value="5616">183 - Which of the following items appear on the same side of the trial balance?</option><option value="5617">184 - The double-entry system of book-keeping normally results in which of the following balances on the ledger accounts?

            Debit balances                                                     Credit balances

   Revenues, capital and liabilities                          Assets and expenses

   Assets and expenses                                           Liabilities, capital and revenues

   Assets, expenses and capital                             Liabilities and revenues

   Assets and revenues                                           Liabilities, capitaland expenses



</option><option value="5618">185 - The most important reason for producing a trial balance prior to preparing the final account is...</option><option value="5619">186 - Julia has prepared a draft income statement for her business.

	                                                          $	               $
Sales		                                                                     256,800
Cost of sales		
Opening inventory	                                 13,400	
Purchases	                                                   145,000	
Closing inventory	                                (14,200)	        (142,000)
Gross profit		                                                 112,600
Expenses		                                                                      (76,000)
Net profit		                                                                        36,600

Julia has not yet recorded the following items:

Carriage in of $2,300
Discounts received of 3,900
Discounts allowed 0f $1,950

After these amounts are recorded, what are the revised gross and net profits of Julia&#039;s Business?
</option><option value="5620">187 - Brian started the month with a positive balance of $1,780 on his bank account. What is the balance after the following transactions in June?

Brian withdraws $200 per week to cover living expenses.
A settlement discount of $30 is taken by a customer on a sale of $600.
An amount of $400 is received from a credit customer.
Bankings of $1,200 from petty cash.</option><option value="5621">188 - Which of the following are books of prime entry?</option><option value="5622">189 - A business entity makes a large loss on a business transaction. Which of the following items will always be reduced in value as a result of loss?</option><option value="5623">190 - A book of prime entry is one in which...</option><option value="5624">191 - You are given the follwing figures for sales and receivables,

	                                                                              2010	  2011
	                                                                                 $	    $
Receivables at year end	                                     74,963	69,472
Sales	                                                                           697,104	
Total cash received from customers	               686,912	
General allowance for receivables	                                           750	     695
Specific allowance for receivables	                                        1,264	
Irrecoverable debts written off	                                        1,697	
		

What was the value of sales during 2011?
</option><option value="5625">192 - What double entry is required to close off the following bank account at the end of the accounting period?

                                                                                  Bank Account
	                                                     $		                           $
Opening balance b/f                                    1,860                   Purchases	    74,400
Sales	                                                  1,240	Wages         114,700
Receivables	                          236,840	Drawings	    62,000
			

Debit side: Opening balance b/f   $42,780.  Credit Side: Closing balance b/f   $42,708.
Debit side: Closing balance b/f    $42,780.   Credit Side: Opening balance b/f   $42,708.
Debit side: Opening balance b/f   $44,640.  Credit Side: Closing balance b/f   $44,640
Debit side: Closing balance b/f    $44,640.   Credit Side: Opening balance b/f   $44,640.
Debit side: Opening balance b/f   $42,800.  Credit Side: Closing balance b/f   $42,800.

</option><option value="5626">193 - Which one of the following might explain a debit balance on a payables ledger account ?</option><option value="5627">194 - Sophie&#039;s payables ledger control account has a blanace at 1 December 2011 of $34,500 credit.

During December, credit purchases were $78,400, cash purchases were $2,400 and payments made to suppliers, excluding cash purchases, and after deducting cash discounts of $1,200,  were $68,900. Purchase reuturns were $4,700.

What was the closing balance?</option><option value="5628">195 - The entries in a receivables ledger control account are,

Sales	                                    $250,000
Bank	                                    $225,000
Returns	                                        $2,500
Irrecoverable debts	                    $3,000
Returned unpaid cheque	$3,500
Contra payables ledger account	$4,000

What is the balance on the receivables ledger control account?</option><option value="5629">196 - Which of the following is not the purpose of a receivables ledger contol account?</option><option value="5630">197 - A credit entry of $405 on Apple&#039;s account in the books of Black could have arisen by...</option><option value="5631">198 - Which of the following best describes the entries that are made using the sales day book totals at the end of each month?</option><option value="5632">199 - A business&#039; petty cash operates on an imprest system with an imprest of $100. All claims for payment must be supported by a third party voucher such as a receipt. Which of the following is the most cost-effective control that should be implemented in addition to an imprest?</option><option value="5633">200 - Which of the following best describes the purpose of a purchase invoice?</option><option value="5634">201 - Which of the following are advantages of computerised accounting systems?</option><option value="5635">202 - For which of the following situations should a provision be created?

(1)   To provide for restructuring costs of $200,000 when the restructuring has been announced to the           employees and has been formally planned by the directors.

(2)   To provide for future anticipated operating losses of $100,000.</option><option value="5636">203 - Which of the following statements is true?

(1) In a computerised system, all accounting personnel will have access to all records.

(2) The general ledger in a computerised system tends to take the same format as that in a manual system, i.e. a number of T accounts. </option><option value="5637">204 - Which of the following best describes an integrated accounting package?</option><option value="5638">205 - Which of the following are features of a spreadsheet?</option><option value="5639">206 - On 1 September 2011, Jones had iventory of $380,000. During the month, slaes totalled $650,000 and purchases $480,000. On 30 September 2011 a fire destroyed some of the inventory. The business operates with a standard gross profit margin of 30%. 

Based on this information, what is the cost of the inventory destroyed in the fire?</option><option value="5640">207 - The following information is available about the transactions of Omar, a sole trader who does not keep proper accounting records.

	                                  $
Opening inventory	         77,000
Closing inventory	         84,000
Purchases	                           763,000
Gross profit margin	              30%

Based on this information, what is Omar&#039;s sales revenue for the year?</option><option value="5641">208 - You are given the following incomplete and incorrect extract from the income statement of a company that trades at a mark up of 25% on cost:

	                                                            $	$
Sales		                                                      174,258
Less: Cost of goods sold		
Opening inventory	                                  12,274	
Purchases	                                                    136,527	
Closing inventory	                                      X	(X)
Gross profit		                                         X

Having discovered that the sales figure should be $174,258 and that purchases returns of $1,084 and sales returns of $1,146 have been omitted, the closing inventory should be...

		
</option><option value="5642">209 - A fire in the offices of Grady has destroyed most of the accounting records.      
The following information has been retrieved.

                                                                                $
Sales	                                                      630,000
Opening inventory	                                    24,300
Closing inventory	                                    32,740
Opening payables	                                    29,780
Closing	                                                        34,600
	
Gross profit for the period should represent a mark up of 40%.

What was the total cash paid to suppliers in the year?
</option><option value="5643">210 - Simpson&#039;s annual inventory cout took place on 6 January 2012. The value of inventory on this date wa s$32,780. During the period from 31 December 2011 6 January 2012, the following events occurred..

Sales	    $8,600
Purchases	    $4,200

The value of inventory at 31 December 2011 was $34,600.

What is the gross margin for Simpson.</option><option value="5644">211 - Reynolds has a markup of 25% on cost of sales. The following information is also available:

	                                                             $
Receivables at start of year	                   6,340
Receivables at end of year	                   5,200
Cash at start of year	                                          620
Cash at end of year	                                          500
Total cash payments	                                     16,780
	
The only receipts during the year consisted of cash and cheques received from customers.

What was the gross profit for the year?
</option><option value="5645">212 - During November, Mark had sales of $148,000, which made a gross profit of $40,000.
Purchases amounted to $100,000 and opening inventory was $34,000.

What was the closing inventory value?</option><option value="5646">213 - From the following information, calculate the value of purchases:

	                                                                  $
Opening trade payables	                    142,600
Cash paid                                          	542,300
Discounts received	                                          13,200
Goods returned	                                          27,500
Closing trade payables	                    137,800
	
	
</option><option value="5647">214 - You are given the following information:

Receivables at 1 January 2011	                                                                   $10,000
Receivables at 31 December 2010	                                               $  9,000
Total receipts during 2011 (including cash sales of $5,000	)                          $85,000

Sales during 2011 amount to:
</option><option value="5648">215 - Dave is a sole proprioter whose accounting records are incomplete. All the sales are cash sales and during the year $50,000 was banked, including $5,000 from the sale of a business car. He paid $12,000  wages in cash from the till and withdrew $2,000 per month as drawings. The cash in the till at the beginning and end of the year was $300 and $400 respectively. 

What were the sales for the year?</option><option value="5649">216 - Many of the Records of Jane have been destroyed by fire. The following information is available for the period under review:


Sales totalled $$480,000	
Inventory at cost was opening $36,420, closing $40,680.	
Trade payables were opening $29,950, closing $33,875.	
Gross profit for the period should represent a mark-up on cost of 50%	

What was the for the period of cash paid to suppliers?
</option><option value="5650">217 - Fraser runs and angling shop in the South of England. He spends all of his spare time fishing and consequently has kept no accounting records in the year ended 30 November 2011. He knows that he has taken $6,800 cash out of the business during the year plus bait which cost the business $250. He can also remember putting his $20,000 winnings on the Euro lottery into the business in June.

Fraser knows that at the last year end his business had assets of $40,000 and liabilities of $14,600. He also calculated that the assets of the business at 30 November 2011 are worth $56,000, and liabilities $18,750.

What profit or loss has Fraser made this year?
</option><option value="5651">218 - Samantha makes and sells handmade pottery. She keeps all finished items in a storeroom at the back of her workshop. In August 2011 Samantha lost pottery which had cost $3,400 and had a retail value of $5,570, in a flood. 

Samantha was insured for loss of inventory due to flooding.

What double entry is required to record the loss of inventory?

Dr Current assets (B/S) $5,750	Cr Cost of sales (IS) $5,750
Dr Current assets (B/S) $3,400	Cr Cost of sales (IS) $3,400
Dr Expense (IS) $3,400	Cr Cost of sales (IS) $3,400
Dr Expense (IS) $5,750	Cr Cost of sales (IS) $5,750
Dr Current assets (B/S) $5,750	Cr Expense (IS) $3,400
 
</option><option value="5652">219 - Which of the following is a source document of petty cash?</option><option value="5653">220 - The opening balance in the receivables account at the beginning of April is $111,750. 
The following transactions occurred during April:


	                           $
Cash sales  	     6,000
Credit sales	 141,900
Discounts allowed	      2,700
Sales returns	      3,600
Cash received	  144,300
 
What was the closing balance on the receivables account at the end of April?
</option><option value="5654">221 - In a period, sales are $140,000, purchases $75,000 and other expenses $25,000. 
What is the net profit to be transferred to the capital account?
</option><option value="5655">222 - A credit balance of $800 brought down on Davis Ltd&#039;s account in the books of Pilkington Ltd means that:</option><option value="5656">223 - Which one of the following is correct?</option><option value="5657">224 - The correct entries needed to record the return of office equipment that had been bought on credit from Armitage, and not paid for, are:

</option><option value="5658">225 - On 1 October, a business had a customer, B Strong who owed $800. During October, B Strong bought goods for $1,400 and returned goods valued at $500. He also paid $640 in cash towards the outstanding balance. The balance on B Strongâ€™s account as at 31 October is:

</option><option value="5659">226 - Which one of the following statements regarding the balance ledger account is NOT correct?</option><option value="5660">227 - Which of the following is the correct entry to record the purchase on credit of inventories intended for resale?

</option><option value="5661">228 - Parsons receives goods from Smith on credit terms and Parsons subsequently pays by cheque.  Parsons discovers that the goods are faulty and cancels the cheque before it is cashed by Smith. How should Parsons record the cancellation of the cheque in his books?

</option><option value="5662">229 - Which of the following transactions would result in an increase in capital employed?</option><option value="5663">230 - The sales account is:</option><option value="5664">231 - An error of commission is where:</option><option value="5665">232 - A business commenced with capital in cash of $3,000. Inventories costing $2,400 is purchased on credit, and half is sold for $1,000 plus sales tax, the customer paying in cash at once.

The accounting equatuin after these transactions would show:</option><option value="5666">233 - An employee is paid $5 per hour. Earnings of more than $75 pa week are taxed 20 percent. Employees&#039; social security tax is 10 percent. During week 40, the employee works for 36 hours.

The amount to be charged to the income statement and paid to the employee are:</option><option value="5667">234 - A company has been notified that a receivable has been declared bankrupt. The company had previously made an allowance for this receivable. Which of the following is the correct double entry?</option><option value="5668">235 - A business purchases a machine on credit terms of $15,000 plus sales tax at 20 percent. The business is registered for sales tax. How should this transaction be recorded in the books?</option><option value="5669">236 - A non-current asset register showed a carrying amount of $67,460. A non-current asset costing $15,000 had been sold for $4,000, making a loss on disposal of $1,250. No entries had been made in the non-current asset register for this disposal.  The balance on the non-current asset is:</option><option value="5670">237 - An organisation&#039;s non-current asset register shows a carrying amount of $125,600. The non-current asset in the nominal ledger shows a carrying amount of $135,600. The difference could be due to a disposed asset not having been deducted from the non-current asset register:
</option><option value="5671">238 - A non-current assest costing $12,500 was sold at a loss of $4,500. Depreciation has been accounted for using the reducing balance, at 20% per annum since its purchase. Which of the following correctly describes the sale proceeds and length of time for which the asset had been owned?</option><option value="5672">239 - The most appropriate definition of depreciaiton is:</option><option value="5673">240 - The most appropriate definition of depreciaiton is:</option><option value="5674">241 - The purpose of charging depreciation on non-current assets is:</option><option value="5675">242 - The phrase &#039;carrying amount&#039; when applied to a non-current assets means that:</option><option value="5676">243 - Which of the following statement regarding goodwill is not correct?</option><option value="5677">244 - Which one of the following should be accounted for as capital expenditure?</option><option value="5678">245 - A non-current asset register is:</option><option value="5679">246 - Working capital will reduce by $500 if:</option><option value="5680">247 - At the beginning of the year, the balance on the allowance for receivables account was $6,000, representing 4 percent of receivables. At the end of the year, receivables amounted to $150,000, but it was decided that the allowance should be increased to 5 percent of receivables. 
Which of the following is correct?

Account entry      Income statement	                  Net receivables in                                    Allowance for
                                                                     statement of financial position	 Receivables account
                                                                     
A	           $1,500 credit	                     $142,500	                                             $7,500 credit
B	           $1,500 debit	                     $142,500	                                             $7,500 credit
C	           $1,500 debit	                     $148,500	                                             $1,500 debit
D	           $1,500 debit	                     $142,500	                                           $13,500 debit
</option><option value="5681">248 - A book of prime entry is one in which:</option><option value="5682">249 - In times of rising prices, the FIFO cost formula for inventories cost, when compared with the average cost method, will usually produce:</option><option value="5683">250 - Ba Limited is registered for sales tax. The manageing director has asked four staff in the accounts department why the output tax for the last quarter does not equla 20 percent of sales (20 percent is the rate of sales tax). Which one of the following replies she received was not correct?</option><option value="5684">251 - When measuring inventories at cost, which of the following shows the correct method of arriving at cost?

</option><option value="5685">252 - A company received an invoice from Burbeck Ltd for 40 units of at $10 each, less 25 percent trade discount, these being items purchased on credit and for resale. It paid this invoice minus a cash discount of 2 percent. Which of the following journal entries correctly records the effect of the whole transaction in the companyâ€™s books?

	                               </option><option value="5686">253 - For which of the following accounting uses is  a spreadsheet least suitable?</option><option value="5687">254 - An item of inventory was purchased for $500. It is expected to be sold for $1,200 although $250 will need to be spent on it in order to achieve the sale. To replace the same item of inventory would cost $650. How should the inventory be valued in the accounts?</option><option value="5688">255 - Stevens buys and sells inventory during the month of December as follows:

Opening inventory		     100 units	$2.52/unit
  4 December	Sales	       20 units	
  8 December	Purchases	     140 units	$2.56/unit
10 December	Sales	       90 units	
18 December	Purchases	     200 units	$2.78/unit
20 December	Sales	     180 units

The periodic weighted average for the month is calculated as follows:

Total value of inventory (opening inventory plus purchase costs during the month) divided by total units (opening inventory plus purchased units during the month). 

Which of the following statements is true?
	
</option><option value="5689">256 - David performs an inventory count on 30 December 2011 ahead of the 31 December year end. He counts 1,200 incidental units, each of which cost $50. On 31 December, David sold 20 of the units fo $48 each. What figure should be included in David&#039;s statement of financial position for inventory at the year end?</option><option value="5690">257 - In the year ended 31 December 2011, Rowland&#039;s records show closing inventory of 1,000 units compared to 950 units of opening inventory. Which of the following statements is true assuming that prices have fallen throughout the year?</option><option value="5691">258 - Which of the following statements about the treatment of inventory and work in progress in financial statements are correct?

1. Inventory should be valued at the lower cost, net realisable value and replacement cost.
2. In valuing work in progress, material costs, labout costs and variable fixed production overheads must be included.
3.Inventory items can be valued using either first in, first out (FIFO) or weighted average cost.
4. A company&#039;s financial statement must disclose the accounting policies used in measuring inventories.</option><option value="5692">259 - Angela&#039;s interior design business received a delivery of fabric on 30 October 2011,which was included in inventory at 31 October 2011. The invoice for the goods was recorded in November 2011.

What effect will this have on the business?</option><option value="5693">260 - What journal entry is required to record goods taken from inventory by the owner of a business?</option><option value="5694">261 - A business had an opening inventory of $180,000 and a closing inventory of $220,000 in its financial statements for the year ended 31 December 2011.

Which of the following entries for these opening and closing inventory figures are made when completing the financial records of the business?</option><option value="5695">262 - Bobby&#039;s annual inventory count took place on 7 November 2011. The inventory value on this date was $38,950. During the period from 31 October 2011 to 7 November 2011, the following took place:

Sales	                    $6,500
Purchases  	$4,250

The mark up is 25% on cost.

What is Bobby&#039;s inventory value at 31 October 2011?</option><option value="5696">263 - Inventory movement for product X during the last quarter were as follows:

January	Purchases	        10 items at $19.80 each
February	Sales	        10 items at $30 each
March	Purchases	        20 items at $24.50 each
	Sales	          5 items at $30 each

Opening inventory at 1 January was 6 items valued at $15 each.

Gross profit fot the quarter, using the continuous weighted average cost method, would be:</option><option value="5697">264 - Your firm values inventory using the weighted average cost method. At 1 October 2011 there were 60 units in inventory valued at $12 each. On 8 October, 40 units were purchased for $15 each, and a further 50 units were purchased for $18 each on 14 October. On 21 October, 75 units were sold for $1,200.

The value of closing inventory at 31 October 2011 was:</option><option value="5698">265 - David Grace is a book wholesaler. On each sale, 4% commission is payable to the selling agent. 

The following information is available in respect of total inventories of three of his most popular titles at his financial year-end.

	                                         Cost      Selling Price
	                                          $	    $
Benny and Joon â€“ C. Ashton	2,280	   2,900
The Hague â€“ M. Constable	4,080	   4,000
Enemy Troopers â€“ J. Walker	1,280	   1,300

What is the total value of these inventories in David&#039;s statement of financial position?

		
</option><option value="5699">266 - An organisation&#039;s inventory at 1 July is 15 units at $3.00 each. The following movements occur:

3 July 2011           5 units sold at $3.30 each
8 July 2011	        10 units bought at $3.50 each
12 July 2011        8 units sold at $4.00 each

Closing inventory at 31 July, using the FIFO method of inventory valuation, would be:</option><option value="5700">267 - What would be the effect ona company&#039;s profit of discovering inventory with cost of $1,250 and a net realisable value of $1,000, assuming that the same inventory had not been included in the originalinventory count?</option><option value="5701">268 - Staines and Co sell three products â€“ Basic, Super and luxury. The following information is available at the year end:
 
	                                          Basic               Super            Luxury
	                                       $ per unit	    $ per unit      $ per unit
Original cost	                           6	         9	            18
Estimated selling price	                           9	       12	            15
Selling and distribution costs	       1	         4	              5
	                                            units	      units	          units
Units in inventory	                         200	       250	           150

The value of inventory at the year-end should be:
</option><option value="5702">269 - In times of rising prices, the valuation of inventory using the First In First Out method, as opposed to the Weighted Average cost method, will result in which one of the following combinations?

</option><option value="5703">270 - Peter is registered for sales tax. During May, he sells goods with a tax exclusive price of $600 to Shirley on credit. As Shirley is buying a large quantity of goods, Peter reduces the price by 5%. He also offers a discount of 3% if Shirley pays within 10 days. Shirley does not pay within the 10 days.

If sales tax is charged at 17.5%,what amount should Peter charge on this transaction?</option><option value="5704">271 - At 1 December 2011, Clive owes the authorities $23,778. During the month of December, he recorded the following transactions:

Sales of $80,000 exclusive of 17.5% sales tax.
Purchases of $590,790 inclusive of sales tax.

What is the balance on Clive&#039;s sales tax account at the end of December?
</option><option value="5705">272 - If Sales (including sales tax) amounted to $27,612.5, and purchases (excluding sales tax) amounted to $18,000, the balance on the sales tax account, assuming all items are subject to tax at 17.5% would be:</option><option value="5706">273 - In the quarter ended 30 September 2011, Paul had taxable sales, net of sales tax, of $90,000 and taxable purchases, net of sales tax, of $72,000.

If the rate of sales tax is 17.5%, how much sales tax is due?</option><option value="5707">274 - A summary of the transactions of Bloomsbury, who is registered for sales tax at 17.5%, shows the following for the month of August 2011:

Outputs   $60,000 (exclusive of tax)
Inputs      $40,286 (inclusive of tax)

At the beginning of the peirod Bloomsbury owed $3,400 to the authorities, and during the period he has paid to them $2,600.

At the end of the period the amount owing to the authorities is?</option><option value="5708">275 - The sales account is:</option><option value="5709">276 - A business sold goods that had a net value of $600 to Jenkins. What entries are required to record this transaction if sales tax is payable at 17.5%?

</option><option value="5710">277 - Neon returned  goods that had a net value of $200. What entries are required to record this transaction if sales tax is payable at 17.5%?</option><option value="5711">278 - Neon returned  goods that had a net value of $200. What entries are required to record this transaction if sales tax is payable at 17.5%?</option><option value="5712">279 - Blue, which is registered for the purposes of sales tax, bought furniture on credit terms at a cost of $8,000, plus tax of $1,400.

What is the correct entry for this transaction? </option><option value="5713">280 - Which of the following statements are true?</option><option value="5714">281 - Brian owns two properties which he rents to tenants. In the year ended 31 December 2011, he received $280,000 in respect of property 1 and $160,000 in respect of property 2. Balances on his rental accounts were as follows:

	           31 December 2011	31 December 2010
Property 1	                    13,400 Dr	                             12,300 Cr
Property 2	                      6,700 Cr	                               5,400 Dr


What amount should b credited to the income statement for the year ended 31 December 2011 in respect of rental income?</option><option value="5715">282 - Draper, a property company, received cash totalling, $838,600 from tenants during the year ended 31 December 2011.

Figures for rent in advance and in arrears at the beginning and end of the year were: 

	                                                             31 December 2010 $	         31 December 2011 $
Rental received in advance	                                102,600	                      88,700
Rent in arrears (subsequently received)                           42,300                                   48,400

What amount of rental income should appear in the company&#039;s income statement for the year ended 31 December 2011?</option><option value="5716">283 - Details of Briggs&#039;  insurance policy are shown below:

Premium for year ended 31 March 2011 paid April 2009   $10,800
Premium for year ended 31 March 2012 paid April 2010   $12,000

What figures should be included in the company&#039;s financial statements for the year ended 30 June 2011?



</option><option value="5717">284 - Hilton sublets part of its office accommodation.

The rent is received quarterly in advance on 1 January, 1 April, 1 July and 1 October. The annual rent has been $24,000 for some years, but it was increased to $30,000 from 1 July 2011. 

What amounts for rent shoule appear in the company&#039;s financial statements for the year ended 31 July 2012?</option><option value="5718">285 - At 1 September, the motor expenses account showed 4 months&#039; insurance prepaid of $80 and petrol accrued of $95. During September, the outstanding petrol bill is paid, plus further bills of $245. At 30 September there is a further outstanding petrol bill of $120.

The amount tob e shown in the income statement for motor espenses is:</option><option value="5719">286 - On 1 May 2011, Allinson pays a rent bill of $1,800 for the period to 30 April 2012. What is the charge to the income statement and the entry in the statement of financial position for the year ended 30 November 2011?</option><option value="5720">287 - The electricity account for the year ended 30 June 2011 was as folows:

	                                                                                  $
Opening balance for electricity accrued at 1 July 2010	300
Payments made during the year:	
 
1 August 2009 for three months to 31 July 2010	600
1 November 2009 for three months to 31 October 2010	720
1 February 2010 for three months to 31 January 2011	900
30 June 2010 for three months to April 2011	                    840

Which of the following is the appropriate entry for electricity? </option><option value="5721">288 - The annual insurance premium for Surridge for the period 1 July 2011 to  30 June 2012 is $13,200, which is 10% more than the previous year. Insurance premiums are paid on 1 July.

What is the income statement charge for insurance for the year ended 31 December 2011?</option><option value="5722">289 - Greg Mousette&#039;s year-end is 30 September. On 1 January 2011 the organisation took out a loan of $100,000 with annual interest of 12%. The interest is payable in equal instalments on the first day of April, July, October and January in arrears.

How much should b echarged tothe income statement account for the year ended 30 September 2011, and how much should be accrued in the statement of financial position?</option><option value="5723">290 - On the first of the month, a business had prepaid insurance of $10,000. On the first day of Month 8, it paid, in full, the annual insurance invoice of $36,000, to cover the following year.

The amount charged in the income statement and the amount shown in the statement of financial position at the year-end is:</option><option value="5724">291 - Which of the following statements is not true?</option><option value="5725">292 - The following balance relate to Bright: 

	                                                                       $
Receivables at 1.1 2011	                          34,500
Cash received from credit customers	    229,900
Contra with payables	                                                1,200
Discounts allowed	                                              17,890
Cash sales	                                                                  24,000
Irrecoverable debts	                                              18,600
Increase in allowance for receivables	      12,500
Discounts received	                                              15,670
Receivables at 31.12 2011	                          45,000

What is the revenue figure reported by Bright in the year ended 31 October 2011?</option><option value="5726">293 -  The following account has been extracted from the nominal ledger of Jet:

                                           Receivables ledger control account 
	                                        $		                                                               $
Balance b/f	                                    84,700		                                                                         Contra with payables ledger          5,000
      control account		                      Irrecoverable debts                                               4,300
Discounts received	                21,100	  Discounts allowed	                                        30,780
Credit sales	              644,000	  Cash received from credit customers            595,000
Cash sales 	                13,500	  Increase in allowance for receivables	  6,555
		                                          Balance c/f	                                      131,655
			
Total	768,300	                                          Total	                                                           768,300

After corrections, what is the receivables balance?
			
</option><option value="5727">294 -  The following account has been extracted from the nominal ledger of Jet:

                                           Receivables ledger control account 
	                                        $		                                                               $
Balance b/f	                                    84,700		                                                                         Contra with payables ledger          5,000
      control account		                      Irrecoverable debts                                               4,300
Discounts received	                21,100	  Discounts allowed	                                        30,780
Credit sales	              644,000	  Cash received from credit customers            595,000
Cash sales 	                13,500	  Increase in allowance for receivables	  6,555
		                                          Balance c/f	                                      131,655
			
Total	                                 768,300	  Total	                                                          768,300

After corrections, what is the receivables balance?
			
</option><option value="5728">295 - Quiggin&#039;s receivables ledger control account shows a balance at the end of the year of $58,200 before making the following adjustments:

(i) Quiggin&#039;s wishes to write off debts amounting to $8,900 as he beleives they are irrecoverable.

(ii) He also wishes to make specific alownace for Dave&#039;s debt of $1,350 and Paul&#039;s debt of $750.

(iii) He wishes to maintain a general allowance of 3% of the year end receivables.

Quiggin&#039;s allowance for receivables at the last year end was $5,650.

What is the charge to the income statement in respect of the above?</option><option value="5729">296 - In the statement of financial position at 31 December 2010, Brian reported net receivables of $12,000. During 2011 he made sales on credit of $125,000 and received cash from credit customers amounting to $115,000. At 31 December 2011, Brian wished to write off debts of $7,100 and increase the allowance for receivables by $950 to $2,100.

What is the net receivables figure at 31 December 2011?</option><option value="5730">297 - At  1 July 2010, a compan&#039;y allowance for receivables was $48,000.

At 30 June 2011, trade receivables amounted to $838,000. It was decided to write off $72,000 of these debts and adjust the allowance for receivables to $60,000.

What are the final amount for inclusion in the company&#039;s statement of financial position at 30 June 2011? </option><option value="5731">298 - At  1 July 2010, a compan&#039;y allowance for receivables was $48,000.

At 30 June 2011, trade receivables amounted to $838,000. It was decided to write off $72,000 of these debts and adjust the allowance for receivables to $60,000.

What are the final amounts for inclusion in the company&#039;s statement of financial position at 30 June 2011? </option><option value="5732">299 - In the year ended 30 September 2011, Flannigan hd sales of $7,000,000. Year end receivables amounted to 5% of annual sales. Flannigan wishes to maintaint the allowance for receivables at 4% of receivables and as a result discovers that the allowance is 20% higher than at the previous year end.

During the year irrecoverable debts amounting to $32,000 were written off and debts amounting to $450 and previously written off were recovered.

What is the irrecoverable debt expense for the year?</option><option value="5733">300 - On 1 January 2011 Jones&#039; trade receivables were $10,000. The following relates to the year ended 31 December 2011:

                                                           $
Credit sales                                100,000
Cash receipts                               90,000
Discounts allowed                             800
Discounts received                           700

Cash receipts include $1,000 in respect of a receivable previously written off.

On 31 December 2011 receivables were:</option><option value="5734">301 - A company had been notified that a customer has beendeclared bankrupt. The company had previously provided for this doubtful debt. Which of the following is the correct double entry?</option><option value="5735">302 - Bellingham is owed $37,500 by its customers at the start, and $39,000 at the end, of its year ended 31 December 2011.

During the period, cash sales of $263,500 and credit sales of $357,500 were made, discounts allowed amounted to $15,750 and discounts received $21,400. Irrecoverable debts of $10,500 were written off and Bellingham wishes to retain its allowance for receivables at 5% ot total receivables. 

The cash received from receivables in the year totalled:</option><option value="5736">303 - The sales revenue in a company is $2 million and its receivables were 5% of sales. The company wishes to have an allowance for receivables of 4%, which would make the allowance one-third higher than the current allowance. 

How will the profit for the period be affected by the change in allowance?</option><option value="5737">304 - A company started the year with total receivables of $87,000 and an allowance for receivables of $2,500.

During the year, two specified debts were written off, one for $800 and the other for $550. A debt of $350 that had been written off as irrecoverable in the previous year was paid during the year. At the year end, total receivables were $90,000 and the allowance for receivables was $2,300.

What is the charge tothe income statement for the year in respect of irrecoverable and doubtful debts?</option><option value="5738">305 - An increase in the allowance for receivables results in:</option><option value="5739">306 - At the end of the year Arlene&#039;s receivables balance is $230,000. She wishes to make specific allowance for Shirley&#039;s debt of $450 and Pauline&#039;s debt of $980. She also wishes to maintain a general allowance of 5% for receivables.

What amount should be charged to the income statement in respect of the allowance if the allowance at the start of the year was $11,700?</option><option value="5740">307 - Which of the following is not a benefit of providing credit to customers?</option><option value="5741">308 - Which of the following best explains the purpose of an aged receivables analysis?</option><option value="5742">309 - The asset register shows a carrying value for non-current assets of $85,600; the ledger accounts include a cost balance of $185,000 and an accumulated depreciation balance of $55,000. Which one of the following may explain the descrepancy?</option><option value="5743">310 - Pamela bought an asset on the 1 January 2009 for $235,000. She has depreciated it at 30% using the reducing balance method. On 1 January 2012, Pamela revalued the asset to $300,000.

What double entry should Pamela post to record the revaluation?</option><option value="5744">311 - A non-current asset register is:</option><option value="5745">312 - IAS 16 property, plant and equipment requires non-current assets to start being depreciated when?</option><option value="5746">313 - The plant and equipment account inthe records of a company for the year ended 31 December 2011 is shown below:

                                                             Plant and equipment - cost
	                                                              $		                                          $
Balance b/f	                                                      960,000		
1 July cash	                                                        48,000	30 September Disposals               84,000
		                                                            Balance c/f	                                    924,000
	                                                  1,008,000		                                 1,008,000


The company&#039;s policy is to charge atraight line depreciation at 20% per year on a pro rata basis. 

What should be the charge for depreciation in the company&#039;s income statement for the year ended 31 December2011?</option><option value="5747">314 - The plant and equipment account inthe records of a company for the year ended 31 December 2011 is shown below:

                                                             Plant and equipment - cost
	                                                              $		                                          $
Balance b/f	                                                      960,000		
1 July cash	                                                        48,000	30 September Disposals               84,000
		                                                            Balance c/f	                                    924,000
	                                                  1,008,000		                                 1,008,000


The company&#039;s policy is to charge atraight line depreciation at 20% per year on a pro rata basis. 

What should be the charge for depreciation in the company&#039;s income statement for the year ended 31 December2011?</option><option value="5748">315 - On January1 2011, a company purchased some plant.

The invoice showed:

	                                                               $
Cost of plant	                                      48,000
Delivery to factory	                                            400
One year warranty covering breakdown	    800
Total 	                                                           49,200

Modifications to the factory building costing $2,200 were necessary to enable the plant to be installed.

What amount should be capitalised for the plant in the company&#039;s records?</option><option value="5749">316 - A non-current asset wa purchased at the beginning of Year 1 for $2,400 and depreciated by 20% per annum using the reducing balance method. At the beginning of Year 4 it was sold for $1,200. The result of this was:</option><option value="5750">317 - A business&#039; non-current assets had a book value of $125,000. An asset which had cost $12,000 was sold for $9,000, at a profit of $2,000.

What is the revised book value fo the non-current asset?</option><option value="5751">318 - Edward bought a new printing machine from abroad. The cost of the machine was $80,000. The installation  costs were $5,000 and the employees received specific training on how to use this particular machine, at a cost of $2,000. Before using the machine to print customers&#039; orders, a test was undertaken which used up paper and ink costing $1,000. 

What should be the cost of the machine in the company&#039;s statement of financial position?</option><option value="5752">319 - A non-current asset was disposed of for $2,200 during the last accounting year. It had been purchased exactly three years earlier for $5,000, withan expected residual value of $500, and had been depreciated on the reducing balance basis, at 20% per annum.

The gain or loss on disposal was:</option><option value="5753">320 - At the end of its financial year, Wan has the following non-current assets:

Land and buildings at cost                                                     $10.4 million
Land and buildings: accumulated depreciation                   $  0.12 million

The company has decided to revalue its land and buildings at the year end to $15 million.

What will be the amount of the adjustment on revaluation?

</option><option value="5754">321 - Which one of the following should be accounted for as capital expenditure?</option><option value="5755">322 - A car was purchased for $12,000 on the 1 April 2008 and has been depreciated at 20% each year straight line, assumung ne residual value.

The company policy is to charge a full year&#039;s depreciation in the year of purchase and no depreciation in the year of sale. The car was traded in for a replacement vehicle on 1 August 2011 for an agreed figure of $5,000.

What was the profit or loss on the disposla of the vehicle for the yea rended 31 December 2011?</option><option value="5756">323 - At 30 September 2012, the following balances existed in the records of BCR:

Plant and equipment:

Cost                                                        $860,000
Accumulated depreciation                   $397,000

During the year ended 30 September 2011, plant with a written down value of $37,000 was sold for $49,000. The plant had originally cost $80,000. Plant purchased during the year cost $180,000. It is the company policy to charge a full year&#039;s depreciation inthe year of acquisition of an asset and none in the year of sale, using the rate of 10% on the straight line basis.

What net amount should appear in BCR&#039;s statement of financial position at 30 September 2011 for plant and equipment?</option><option value="5757">324 - Depreciation is best described as:</option><option value="5758">325 - On 1 January 2011,  Davis has a building in its books at cost $380,000, net book value $26,000.

On 1 July 2011, the asset is revalued at $450,000 and Davis wishes to include the valuation in its books. Davis&#039; accounting policy is to depreciate buildings at 3% straight line.

The depreciation charge to the income statement for the year ended 31 December 2011 is:</option><option value="5759">326 - A car was purchased by a newsagent business in May 2007 for:

                                                             $
Cost                                                 10,000          
Road tax                                               150
                                                         ______
                                                         10,150

The business adopts 31 December as its year end.
The car was traded in for a replacement vehicle in August 2011 at an agreed value of $5,000.
It has been depreciated at 25% per annum on the reducing balance method, charging a full year&#039;s depreciation in the year of purchase and none in the year of sale.

What was the profit or losson disposal of the vehicle during the year ended December 2011?


                                                               
</option><option value="5760">327 - Robinson bought a machine for $40,000 in January 2008. The machine had an expected useful life of six years and an expected residual value of $10,000. The machine was depreciated on the straight line basis. At the end of December 2011, the machine was sold for $15,000. Robinson charges pro rata depreciation.

The total amount charged to the income statement over the life of the machine was:</option><option value="5761">328 - Robinson bought a machine for $40,000 in January 2008. The machine had an expected useful life of six years and an expected residual value of $10,000. The machine was depreciated on the straight line basis. At the end of December 2011, the machine was sold for $15,000. Robinson charges pro rata depreciation.

The total amount charged to the income statement over the life of the machine was:</option><option value="5762">329 - The reducing balance method of depreciating non-current assets is more appropriate than the straight line method when:</option><option value="5763">330 - Sally bought a guillotine for her farming business for $20,000 on 1 July 2009. She expected the guillotine to have a useful life of ten years and a residual value of $500.

om 1 July 2012, Sally revises these estimations and believes the guillotine to have a remaining useful life of five years and no residual value.

What is the depreciation charge for the year ended 30 June 2011?</option><option value="5764">331 - When sales tax is not recoverable on the cost of a motor car, it should be treated in which of the following ways?</option><option value="5765">332 - Purchase of goods costing $600 subject to sales tax at 17.5% occur. Which of the following correctly records the credit purchase?</option><option value="5766">333 - An item of inventory was purchased fo $20. However, due to a fall in demand, its selling price is only $16. In addition further costs will be incurred prior to sale of $2. What is the net realisable value?</option><option value="5767">334 - When valuing inventory at historical cost, which of the following methods are appropriate?</option><option value="5768">335 - What is an assets net book vlaue?</option><option value="5769">336 - A non-current asset (cost $20,000, depreciation $15,000) is given in part exchange for a new asset costing $41,000. The agreed trade-in value was $7,000. The income statment will include? </option><option value="5770">337 - Why might the assets register not reconcile with the non-current asstes?</option><option value="5771">338 - What is the required accounting treatment for expenditure on research?</option><option value="5772">339 - Research expenditure is incurred in the application of knowledge for the production of new products.</option><option value="5773">340 - How is the cost of goods sold calculated?</option><option value="5774">341 - If a business has paid rent of $2,000 for the year to 31March 2012, what is the prepayment in the accounts for the year to 31 December 2011?</option><option value="5775">342 - What is the correct journal for an electricity payment of $300?</option><option value="5776">343 - An accrual is an expense charge against profit for a period, even though it has not yet been paid or invoiced.</option><option value="5777">344 - An allowance for receivables of 2% is required. Trade accounts receivable at the period end are $200,000 and allowable for receivables brought forward from the previous period is $2,000. What movement is required this year?</option><option value="5778">345 - If a receivable allowance is increased, what is the effect on the income statement?</option><option value="5779">346 - What is the double entry to record an irrecoverable debt written off?</option><option value="5780">347 - A company is being sued for $20,000 by a customer. The company&#039;s lawyers beleive the claim is likely to   be upheld. Legal fees are currently $3,500.

How should the company account for this?</option><option value="5781">348 - A company is being sued for $20,000 by a customer. The company&#039;s lawyers beleive the claim is likely to   be upheld. Legal fees are currently $3,500.

Considering the above information, how much of a provision should be made if further legal fees of $2,000 are likely to be incurred?

</option><option value="5782">349 - Which of the following data is input into a receivables ledger system?</option><option value="5783">350 - Which of the following should be accounted for as capital expenditure?</option><option value="5784">351 - A business purchases a machine on credit terms for $18,000 plus sales tax at 20%. The business is registered for sales tax. How should this transaction be recorded in the books?</option><option value="5785">352 - A business purchases a machine on credit terms for $18,000 plus sales tax at 20%. The business is registered for sales tax. How should this transaction be recorded in the books?</option><option value="5786">353 - A company includes in inventories goods received before the year end but for which invoices are not received until after the year end. Which convention is this in accordance with?</option><option value="5787">354 - A business purchased an asset on 1 June 2009 at a cost of $24,000. It has an expected life of five years, and is being depreciated at the rate of 25% per year by the reducing blanace method. The asset was sold on 31 May 2011 for $90,000.

What was the loss or gain on disposal?</option><option value="5788">355 - Which of the following might explain the debit balance on a purchase ledger account?</option><option value="5789">356 - Which of the following might explain the debit balance on a purchase ledger account?</option><option value="5790">357 - The correct ledger entries to record the issue of 200,000 $1 Ordinary Shares at a premium of 20% and paid by cheque is:</option><option value="5791">358 - A credit balance of $1,000 brought down on Able Ltd&#039;s account in the books of Cane Ltd means that:</option><option value="5792">359 - A business is normally said to have earned revenue when:</option><option value="5793">360 - Granger Plc has a policy that all items of equipment wch cost less than $2,000 are charged to an expense account rather than a non-current asset account. This is an example of which convention?</option><option value="5794">361 - Which of the following is not an intangible non-current asset?</option><option value="5795">362 - Bragg Ltd received an invoice for the purchase of non-current asset equipment which was credited to the correct supplier&#039;s ledger account but debited to the equipment repairs account instead of the equipment account. The effect of not correcting this error on the financial statements would be?</option><option value="5796">363 - The total cost of salaries charged to a limited company&#039;s income statement is:</option><option value="5797">364 - The main advantage of using a sales ledger control account is that:</option><option value="5798">365 - King sells goods to Crown on credit. Crown receives a trade discount of 5% on the list price of goods from King. In addition, King offers a 3% settlement discount for payment received within seven days of the invoice date. Crown bought goods from King with a list price of $200,00. Sales tax is at 20%. What amount should be included in King&#039;s receivables ledger for this transaction?</option><option value="5799">366 - Which of the following errors would cause a trial balance not to balance?</option><option value="5800">367 - A company&#039;s trial balance failed to agree, and a suspense account was opened for the difference.

Which of the following errors would require an entry in the suspense account in order to correct them?

1. A cash refund to a customer had been recorded by debiting the cash book and crediting the customer&#039;s account.
2. The debit side of the postages expenses account had been undercast.
3. A cash payment to acquire a new machine had been correctly entered in the cash book but debited to machine repairs account.
4. The total of the discounts received account in the cash book had been debited to discounts allowed.</option><option value="5801">368 - The debit side of a company&#039;s trial balance totals $960 more than the credit side. Which one of the following errors would account fully for the difference?</option><option value="5802">369 - A company&#039;s bookkeeper made the following errors:

Discounts received of $3,608 were debited to the discounts allowed account.
Discounts allowed of $2,816 were credited to the discounts received What journal entry would correct these errors?account.

</option><option value="5803">370 - Golden Days, a holiday services provider, is a limited liability company, and  has to deal with the following items at the end of its financial year:


(1) Golden Days has provided a guarantee for a bank loan to another business entity. The likelihood of a liability actually arising from the guarantee is assessed as possible.

(2) Golden Days provieds warranties to customers for its holiday services. Experience shows that about 4% of sales give rise to a claim under warranty. 

How should these items be reported (if at all)in the financial statements?</option><option value="5804">371 - Which of the following statements are correct about the requirements of IAS37: Provisions, Contingent Liabilities and ontingetn Assets?

(1) A contingent asset must be disclosed in a note if an inflow of ecenomic benefits is probable.

(2) No disclosure is required for a contingent liability if the likelihood of a transfer of economic benefits arising is remote.

(3) Contingent assets must not be recognised in financial statements unless an inflow of economic benefits is virtually certain to arise.</option><option value="5805">372 - Which of the following statements are correct about provisions for contingent liabilities?

1. If it is probable that a liability will occur and result in an outflow of economic benefts, but its value is not certain, a provision should be created.

2. A provision can be made for future reorganisation costs, but only if certain conditions are met.

3. A provision can be made for future operating losses, but only if certain conditions are met.

4. A reduction in provision increases profit for the year.

</option><option value="5806">373 - A company&#039;s land and buildings were valued as follows:

	             Cost	Accumulated        Net book value
                                                            depreciation	
	                $ 	                             $	                    $
Land	          960,000	         0	               960,000
Buildings           2,400,000	   240,000	            2,160,000

The land is revalued to $1,120,000 and the building to $2,720,000.

What entries should be made int eh main ledger to account for the revaluation?

</option><option value="5807">374 - The plant and machinery at cost account of a business for the year ended 31 December 2011 was as follows:
                                                  Plant and machinery - Cost

2011	                             $		2011	                                                     $
1 Jan Balance	1,440,000		30 Sept Transfer disposal account	       126,000
1 July Cash	      72,000		31 Dec Balance	                        1,386,000
				
	                    1,512,000			                                            1,512,000

The company&#039;s policy is to charge depreciation at 20% per year on a straight line basis, with proportinate depreciation in the years of purchase and disposal.

How much depreciation should be charged for the year ended 31 December 2011?				</option><option value="5808">375 - A company prucahsed an asset on 1 January 2009 at a cost of $250,000. The asset had an expected life of ten years and a residual value of $$36,000. Straight line depreciation is used. The company&#039;s financial year ends on 31 December.

At 31 December 2011, the estimated remaining life of the asset from that date is now expected to be only four more years, but the residual value is unchanged.

What will be the net book value of the asset at 31 December 2012, for inclusion inthe statement of financial position? </option><option value="5809">376 - A company purchased a building two years ago for $4.8 million. The building has an expected life of 50 years and straight line depreciation is used. After two years the building was revalued to $5.76 million.

What should the accounting entries be for depreciation and excess depreciation inthe following year?

</option><option value="5810">377 - A company purchased a building two years ago for $4.8 million. The building has an expected life of 50 years and straight line depreciation is used. After two years the building was revalued to $5.76 million.

What should the accounting entries be for depreciation and excess depreciation inthe following year?

</option><option value="5811">378 - Details of a company&#039;s insurance costs are as follows:

Premium for  year ending 31 March 2011, paid April 2010: $82,800
Premium for  year ending 31 March 2012, paid April 2011: $90,000

What figures shouls be included within the profit or loss for the year to 30 June 2011 for insurance costs, and what should be included inthe statement of financial position as at 30 June 2011?</option><option value="5812">379 - A company owns a number of office properties that it rents to tenants. The following information is available for the year ended 30 June 2011:

	                  Rent in                   Rent in 
                                     advance	         arrears
              
	                       $	            $
30 June 2010             166,270	         7,410
30 June 2011             179,530	       12,220

Cash received from tenents during the year to 30 June 2011 was $1,232,790. All rental income arrears were subsequently received in full.

What figure should appear in the profit and loss for the year to 30 June 2011 for rental income?</option><option value="5813">380 - A company has occupied rented premises for a number of years, paying rent quarterly in advance on 1 January, 1 April, 1 July and 1 October each year. Until 1 April 2011, the annual rental was $288,000. It was then increased to $345,600 each year.

What figures would appear on the company&#039;s financial statements for rent for the year ended 30 November 2011?</option><option value="5814">381 - The following control account has been prepared by a trainee accountant:

                          Receivables ledger control account     
	                                             $		                                                                  $
Opening balance	                   537,800  	  Cash received from credit customers	212,800
Credit sales	                   213,600	  Interest charged on overdue accounts	     3,200
		                                          Discounts allowed	                                             4,800
Cash sales	                                         31,400	  Bad debts written off	                                           11,800
Contras against payables ledger	 10,600	  Allowance for receivables                                       6,200
		                                          Closing balance	                                         572,600
			
	                                      811,400		                                                             811,400

What should the closing balance be after correcting the errors made in preparing the account?</option><option value="5815">382 - Alpert has extracted the following balances from hi accounts:
 
                	                                 $			                                             $
			                              Capital	                  100,000
Plant machinery	        89,000	          Drawings	                    23,000
Property	                          120,000                             Sales    	                  330,000
Inventory	                              4,600                              Purchases	                  165,000
Payables                                  6,300                              Sales returns	                       7,000
Receivables	          5,900                              Discounts allowed	   3,200
Bank overdraft	             790		          Discounts received	       ?
Loan	                           50,000		          Sundry expenses	                     73,890

He has forgotten to extract the balance from the discounts received account. What is the balance?
           
 </option><option value="5816">383 - Which of the following statements are true?

</option><option value="5817">384 - Which of the following are limitiations of the trial balance?

1. It does not identify errors of commission.
2. It does not identify in what accounts errors have been made.
3. It does not include final figures to be included in the financial statements.</option><option value="5818">385 - The following is an extract from the trial balance of Cooper Ltd:

	                                      	Dr	              Cr
		
Non-current assets	                50,000	
Inventory	                                      2,600	
Capital		                                                  28,000
Receivables	                  4,500	
Allowance for receivables		               320
Cash	                                         290	
Payables	                                                                        5,000	
Sales	                                                                    120,000	
Purchases	                                   78,900	
Rental expense	                 3,400	
Sundry expenses	               13,900	
Bank interest		                                   270
		
	                                 153,590	        153,590

Rent of $200 hasbeen prepaid,  Inventory at the end of the year was $1,900 and  The allowance for receivables is to be $200.

What is the profit for the year?</option><option value="5819">386 - The following is an extract from the trial balance of Brown. After making corrections, what is the revised balance on the suspense account?

	                                                  Dr	                      Cr

Premises	                                            500,000	
Provision for depreciation		                120,000
Inventory		                                                          23,000
Share capital	                        200,000	
Retained profits		                                    105,000
Receivables	                          43,500	
Carriage in		                                                            1,500
Allowance for receivables		                    3,400
Bank overdraft	                           1,010	
Payables		                                                          35,900
Sales		                                                        500,000
Purchases	                                           359,700	
Sales returns	                         10,300	
Sundry expenses	                         14,000	
Discounts allowed		                                       1,340
Suspense		                                                       338,290
		
	                                        1,128,510	            1,128,510
</option><option value="5820">387 - The following year end afjustments are required:

Closing inventory of $45,700 to be recorded.
Depreciation at 20% straight line to be charged on assets with a cost of $470,800.
An irrecoverable debt of $230 to be written off.
Deferred income of $6,700 to be recoreded.

What is the impact on net assets of these adjustments?</option><option value="5821">388 - The following is the extract of Jamieâ€™s trial balance at 31 December 2011:

	   Dr	Cr
	    $	$
Rent 	22,000	
Insurance 	30,000	

The following notes have been provided:

(i)	The monthly rent charge is $2,000
(ii)	The annual insurance charge for the above year is $28,000

What is the charge for the rent and insurance for the year and the closing accrual and prepayment?
</option><option value="5822">389 - The following is the extract of Sophie Traskâ€™s trial balance at 31 December 2011:

	                                        Dr	Cr
	                                         $	 $
Receivables	                29,600	
Allowance for receivables		3,100
Irrecoverable debts	                  1,600	

The following notes are provided:

(i)	Additional irrecoverable debts of $3,000 were discovered at the year end.
(ii)	It has been decided to make an allowance for receivables of 10% on the adjusted receivables at the year end.

The total bad debt expense (irrecoverable debts and allowances for receivables) for the year ended 31 December 2011 and the closing net receivables balances as at 31 December 2011 will be?
</option><option value="5823">390 - The following is an extract from Logan&#039;s trial balance:

	                                                                             Dr	                         Cr
	                                                                              $	                          $
Plant machinery	                                                      50,000	
Plant machinery and accumulated depreciation		                     15,000

The policy of the business is to charge depreciation at 10% per annum on a straight line basis.

What is the income statement depreciation charge for the year ended 31 Decembr 2011 and the closing net book value as at 31 December 2011?
</option><option value="5824">391 - The following is the extract of Stevenâ€™s trial balance at 31 December 2011:

	                                                                            Dr	Cr
	                                                                             $	                     $
Motor vehicles	                                                     50,000	
Motor vehicle accumulated depreciation		                21,875

The  policy of the business is to charge depreciation at 25% per annum on a reducing balance basis.

What is the income statement depreciation charge for the year ended 31 December 2011 and the closing net book value as at 31 December 2011?</option><option value="5825">392 - A payables ledger control account showed a credit balance of $768,420. The payables ledger totalled $781,200.

Which one of the following possible errors could account in full for the difference?</option><option value="5826">393 - The payables ledger control account below contains a number of errors:

                                                          Payables ledger control account
	                                                          $		                                              $
Balance b/f	                                                    318,600		
Cash paid to suppliers                              1,364,300	Purchases	                                        1,268,600
Purchase returns	                                  41,200	Contras against debit balances	
		                                                             in receivables ledger	                         48,000
Refunds from suppliers 	                2,700	Discounts received	                           8,200
		                                                            Balance c/f                                 	   402,000

                                                                      1,726,800                                                                        1,726,800
All items relate to credit purchases.

What should be the closing balance when all the errors have been corrected?
</option><option value="5827">394 - Brown received a statement from one of its suppliers, Golding, showing a blance due of $3,980. The amount due according to the payables ledger account of Brown was only $230.

Comparison of the statement and the ledger account revealed the following differences:

1. Brown mad a contra entry, reducing the amount due to Golding by $3,200, for a balance due from Golding in Brown&#039;s receivables ledger. No such entry has been made in Golding&#039;s records.

2. A cheque sent by Brown for $270 has not been allowed for in Golding&#039;s statement.

3. Golding has not allowed for goods returned by Brown $180.

What difference remains between the two companies&#039; records after adjusting for these items?</option><option value="5828">395 - A business&#039; sales (receivables) ledger control account did not agree with the total o fthe balance on the receivables ledger. An investigation revealed that the sales day book had been overcast by $10. What effect will this have on the discrepency?</option><option value="5829">396 - A supplier sent Jade a statement showing a blance of $14,305. Jade&#039;s records show a balance outstanding of $14,500.

What could be the reason for this difference?</option><option value="5830">397 - Which of the following would NOT lead to a difference between the total of the balances on the receivables ledger and the balance on the receivables ledger control account?
</option><option value="5831">398 - A receivables ledger control account showed a debit balance of $37,642. The individual customer&#039;s accounts in the receivables ledger showed a total of $35,840. The difference could be due to:
</option><option value="5832">399 - Jane has received a statement of account from one of her suppliers, showing an outstanding balance due to them of $1,350. On comparison of the ledger account, the following is determined:

The ledger account shows a credit balance of $260.
The supplier has disallowed a cash discount of $80 due to late payment of an invoice.
The supplier has not yet allowed for goods returned at the end of the period of $270.
Cash in transit of $830 has not been received by the supplier.

Following consideration of these items, the unreconciled difference between the two records is:</option><option value="5833">400 - The purchase day book for Bridges has been undercast by $500, and the sales day book has been overcast by $700. Bridges maintains payables and receivables ledger control accounts as part of the double entry bookkeeping system.

The effect of correcting these errors will be to:</option><option value="5834">401 - {Question Required}</option><option value="5835">402 - For the month of November 2011 Michelle&#039;s purchases totalled $225,600 with sales tax of $33,840. The total of $259,440 has been credited to the payables ledgr control account as $254,940.

Which of the following adjustments is correct:</option><option value="5836">403 - In reconciling the receivables ledger control account with the list of receivables ledger balances of Kelly, the following errors were found:

1. A total of $940 from the cash receipts book has been recorded in the receivables ledger control account as $490.

2. The sales day book had been overcast by $370.

What adjustments must be made to correct the errors? </option><option value="5837">404 - The cash book of Brookfield sjows a credit balance of $1,350. Cheques of $56 have been written to suppliers but not yet cleared by the bank; uncleared lodgements amount ro $128. The bank has accidentally credited Brookfield&#039;s account with interest of $15 due to another customer. A standing order of $300 has not been accounted for in the general ledger. 

What is the balance on the bank statement?</option><option value="5838">405 - Andrew&#039;s bank ledger account shows a balance of $190 credit. His bank statement reports a balance of $250 credit.

Which of the following will explain the difference in full?</option><option value="5839">406 - Which of the following statements about bank reconciliations are correct?</option><option value="5840">407 - Which of the following statements about bank reconciliations are correct?</option><option value="5841">408 - The following bank reconciliation statement has been prepared by an inexperienced bookkeeper at 31 December 2011.

	                                                                                  $
Balance per bank statement (overdrawn)	                  38,640
Add:  Lodgements not credited	                                      19,270
	                                                                              57,910
Less unpresented cheques	                                      14,260
Balance per cash book	                                      43,650
	
	
What should the final cash book balance be when all the above items have been properly dealt with?
</option><option value="5842">409 - A bank reconciliation statement for Edward at 30 November 2011 is being prepared. The following information is available:

1. Cheques received but not yet banked amounted to $890.
2. A bank error has resulted in a cheque for $97 being debited to Edward&#039;s account instead of Noble&#039;s account.
3. The bank statement shows a balance of $200 Dr.
4. Bank charges of $2,340 have been entered in the cash book.
5. A direct debit of $250 has not been recorded in the ledger accounts.
6. Unpresented cheques amount to $1,250.

The final balance in the cash book after all necessary adjustments should be:</option><option value="5843">410 - The following information relates to a bank reconciliation:

1. The bank balance in the cash book before taking the items below into account was $8,970 overdrawn.
2. Bank charges of $550 on the statement have not been entered in the cash book.
3. The bank has credited the account in error with $425 which belongs to another customer.
4. Cheques totalling $5,380 have been correctly entered on the debit side of the cashbook but have not been paid in at the bank.
5. Cheque payments totalling $3,275 have been entered in the cashbook but have not been presented for payment.

What was the balance shown by the bank statement before taking the items above into account?</option><option value="5844">411 - Deborah&#039;s bank statement at 31 October 2011 showa a balance of $13,400. She subsequently discovers that the bank has dishonoured a customer&#039;s cheque for $300 and has been charged bank charges of $50, neither of which is in the cash book.

There are unpresented cheques totalling $1,400 and a nautomatic receipt from a customer of $195 has been recorded as a chredit in Deborah&#039;s cash book.

Deborah&#039;s cash book balance, prior to correcting the errors and omissions, was:</option><option value="5845">412 - Ashworth&#039;s bank statement shows a balanc eof $715 overdrawn. The statement includes bank charges of $74 which have not been entered into the cash book. There also unpresented cheques totalling $824 and lodgements not yet credited of $337. In addition the bank statement erroneously includes a dividend receipt of $25 belonging to another customer. 

The bank overdraft in the statement of financial position should be:</option><option value="5846">413 - The cash book shows a balance of $5,675 overdrawn at 31 December 2011. It is subsequently discovered that a standing order for $125 has been entered twice, and that a dishonoured cheque for $450 has been debited in the cash book instead of credited.

The correct bank balance should be:</option><option value="5847">414 - An organisation&#039;s cash bookhas an opening balance of $495 credit. The following transactions then took place:

Cash sales $1,450 including sales tax of $150.
Receipts from customers of debts $2,400.
Payments to suppliers for debts of $1,800 less 5% cash discount.
Dishonoured cheques from customers amounting to $250.

The resulting balance in the cash book should be:</option><option value="5848">415 - The bank statement at 31 October 2011 showed an overdraft of $800. On reconciling the bank statement, it was discovered that a cheque drawn by your company for $80 had not been presented for payment, and that a cheque for $130 from a customer had been dishonoured on 30 October 2011, but that this had yet been notified to you by the bank.

The correct balance to be shown in the statement of financial position at 31 October 2011 is:</option><option value="5849">416 - Your firm&#039;s cahs book at 30 April 2011 shows a balance at the bank of 2,490. Comparison with the bank statement at the same date reveals the following differences:

                                                                                   $
Unpresented cheques                                           840
Bank charges not in cash book                              50
Receipts not yet credited by the bank                 470
Dishonoured cheques not in cash book              140

The correct bank balance at 30 April 2011 should be:
         </option><option value="5850">417 - Your firm&#039;s cahs book at 30 April 2011 shows a balance at the bank of 2,490. Comparison with the bank statement at the same date reveals the following differences:

                                                                                   $
Unpresented cheques                                           840
Bank charges not in cash book                              50
Receipts not yet credited by the bank                 470
Dishonoured cheques not in cash book              140

The correct bank balance at 30 April 2011 should be:
         </option><option value="5851">418 - Your firm&#039;s cash book shows a credit balance of $1,240 at 30 November 2011. On copmariosn with the bank statement, you determine that there unpresented cheques totalling $450, and a receipt of $140 which has not yet been passed through the bank account. The bank statement shows bank charges of $75 which have not yet been entered in the cash book. 

The balance on the bank statement is:</option><option value="5852">419 - Which of the following can not be an &#039;unrecorded difference&#039; when  reconciling the balance on the cash book to the amount shown in the bank statement?</option><option value="5853">420 - Which of the following is not an &#039;unrecorded difference&#039; when  reconciling the balance on the cash book to the amount shown in the bank statement?</option><option value="5854">421 - The trial balance of Harper does not balance. Which of the followinf errors could explain this, assuming that Harper maintains control accounts for its receivables and payables within the double entry system?</option><option value="5855">422 - The trial balance of Trigger does not balance at the year end. Which of the following would explain this?</option><option value="5856">423 - The trial balance of Winston Ram shows total debits of $125,819 and total credits of $118,251. Which of the following explains the difference in full?</option><option value="5857">424 - The trial balance of Potter did not balance, and a suspense account was opened for the difference.

Which of the following errors would require an entry to the suspense account in order to correct them?</option><option value="5858">425 - A companies trial balance failed to agree and a suspense account was opened for the difference.

Subsequent checking revealed that discounts allowed of $13,000 had been credited to the discounts received account and an entry on the credit side of the cash book for the purchase of some machinery costing $18,000 had not been posted to the plant machinery account.

Which two of the following journal entries would correct the errors?</option><option value="5859">426 - A companies trial balance failed to agree and a suspense account was opened for the difference.

Subsequent checking revealed that discounts allowed of $13,000 had been credited to the discounts received account and an entry on the credit side of the cash book for the purchase of some machinery costing $18,000 had not been posted to the plant machinery account.

Which two of the following journal entries would correct the errors?</option><option value="5860">427 - The draft accounts of Rick&#039;s business for the year ended 31 July 2011 shows a profit of $54,250 prior to the correction of the following errors. 

1. Cash drawings of $250 have not been accounted for.

2. Debts amounting to $420, which were provided against in full during the year, should have been written off as unrecoverable.

3. Rental income of $300 had been classified as interest receivable.

4. On the last day of the accounting period, $200 in cash was received from a customer, but no bookkeeping entries have yet been made.

What is the correct profit of the business for the year?</option><option value="5861">428 - The trial balance of Pertwee, a limited liability company, does not agree and a suspense account ahs been opened.

Inventory bought at a tax inclusive cost of $4,700 has been credited to the payables ledger control account. The sales tax, at 17.5% has been recorded in the sales tax account and the $4,700 has been recorded in the purchases account.

What entry is required to correct the error?

</option><option value="5862">429 - Jennifer&#039;s trial balance at 31 October 2011 is out of agreement, with the debit side totalling $500 less than the credit side. During November, the following errors are discovered:

The credit side of the sales account for October had been undercast by $150.

Rent received of $240 had been credited to the rent payable account.

The allowance for receivables, which decreased by $240, has been recorded in the allowance for receivables account as an increase.

Following the corrections to these errors, the balance on the suspense account would be:

</option><option value="5863">430 - Which one of the following is an error of principle?</option><option value="5864">431 - The trial balance of Zara did not agree, and a suspense account was opened for the difference. On checking, the bookkeeping system revealed a number of errors.

1. $4,600 paid for motor van repairs was correctly treated in the cash book but was credited to motor vehicles asset account.
2. $360 received from Jane, a customer, credited in error to the account for Ford.

3. $9,500 paid for rent was debited to the rent account as $5,900.

4.The total of the discount allowed column in the cash book had been debited in error to the discounts received account.

5. No entries had been made to record the cash sale of $100.

Which of the errors above would require an entry to the suspense account as part of the process for correcting them?</option><option value="5865">432 - Darren gives  a cash discount of $40 to a customer. The discount is credited to the discounts allowed account.

The effect of recording the discount in this way is that profit will be:</option><option value="5866">433 - A suspense account was opened when a trial balance failed to agree. The following errors were late discovered:

1. An electric bil of $420 had been recorded in the Electric account as $$240.

2. Interest received of $70 had been entered in the bank account only.

3. Discount of $50 given to a customer had been credited to Discounts received.

The original balance on the suspense account was:</option><option value="5867">434 - The bookkeeper of KBM was instructed to make a contra entry for $270 between the supplier account and the customer account for Reynolds. He recorded the transaction by debiting the customer account and crediting the supplier account with $270. The business account does not include control accounts.

Which of the following statements are correct?</option><option value="5868">435 - If an owner takes goods out of inventory for his own use, how is this dealt with?</option><option value="5869">436 - A business starts trading on 1 September 2011. During the year, it has sales of $500,000, purchases $250,000 and closing inventory of $75,000. What is the gross profit for the year?</option><option value="5870">437 - William&#039;s trial balance includes the following items: non-current assets $50,000, inventory $15,000, payables $10,000, receivables $5,000,bank $110,000, allowance receivables $1,000.

What is the figure for total assets?</option><option value="5871">438 - A supplier sends you a statement showing a balance outstanding of $12,500. Your own records show a balance outstanding of $12,650. 

The reasons for this difference would most likley be?</option><option value="5872">439 - A suspense account shows a credit balance of $260.

This could be due to:</option><option value="5873">440 - After calculating your company&#039;s profit for 2011, you discover that:

A non-current asset costing $50,000 has been included in the purchases account.

Stationery costing $10,000 has been included as closing inventories of raw materials, instead of inventories of stationery.

What would be the effect of these two errors?</option><option value="5874">441 - Which of the following is not the purpose of a sales ledger control account?</option><option value="5875">442 - When recording the payables ledger control account with the list of payable ledger balances og KMB Fashion&#039;s, the following errors were found:

The purchase daybook had been overstated by $300;
The purchase ledger of a supplier had been understated by $600.

NOT SURE HOW TO FINISH THE QUESTION::::::

Maybe, what corrections would need to be made to correct these errors?</option><option value="5876">443 - In a receivables reoprt, which of the following would you not expect to see?</option><option value="5877">444 - The suspense account shows a debit balance of $200. This could be due to:</option><option value="5878">445 - Ensuring that the assets of a company are properly safeguarded and utilised efficiently and effectively is part of:</option><option value="5879">446 - A fair presentation (or a &#039;true and fair view&#039;) occurs when:</option><option value="5880">447 - Your company&#039;s trial balance does not balance. Which of the following may be the cause of this failure to balance?</option><option value="5881">448 - Which of the following would not affect the totals in the trial balance agreeing?

(i) A cash sale has been recorded as a debit cash sale, credit cash.

(ii) An invoice for a vehicle expenses has been charged to the vehicle non-current asset account.

(iii) An invoice for $250 for rent has been omitted from the ledgers.

(iv) A payment received from a supplier has been posted to the personal account twice.</option><option value="5882">449 - The following data relates to the business of Delfino&#039;s for the year ended 31 December 2011:

	                                            $
Inventory at 1 January 2011	51,240
Inventory at 31 December 2011	57,960
Purchases	                                      335,520
Purchase returns	                       4,080
Discounts received	                       2,520

What was the cost of sales for the year ended 31 December 2011?
	</option><option value="5883">450 - The following relates to the business Briggs Bins for the year eneded 31 Dcember 2011:

	                                                                                      $
Inventory at 31 December 2011	                                          40,180
Inventory at  1 January r 2011	                                          49,560
Purchases	                                                                                315,700
Inventory taken by the owner for personal use, at cost            11,200
This inventory taken by the owner had a sales value of           21,000

What was the cost of sales for the year to 31 December 2011?</option><option value="5884">451 - At 1 January 2011, a business had 1,080 units of an inventory item, each costing $60. During the month of January 2011, the following purchases and sales of the inventory item occurred.

15 January	Purchased 540 units at $65 each
16 January	Sold 360 units for $40,000
20 January	Purchased 720 units at $70 each
28 Jnauary	Sold 350 units for $38,400

The business uses the FIFO method of inventory valuation.

What was the value of closing inventory for this item at 31 January 2011?

</option><option value="5885">452 - At 1 July 2011, a business had 280 units of an inventory item, each costing $80. During the month of July 2011, the following purchases and sales of this inventory item occurred:

15 January	Purchased 540 units at $65 each 
16 January	Sold 360 units for $40,000
20 January	Purchased 720 units at $70 each
28 January	Sold 350 units for $38,400

The business uses the average cost method of inventory valuation, an a continuous basis.

What was tthe value of the closing inventory for this item at 31 January 2011?</option><option value="5886">453 - The following bank reconciliation statement has been prepared by an inexperienced book keeper at 31 December 2011.

	                                                                 $
Balance per bank statement (overdrawn)	 4,560
Less: Outstanding cheques	                  (12,672)
	                                                             8,112
Add: Deposits credited after statement date	20,320
Cash at bank	                                        28,432

What should be teh correct balance in the cash book?</option><option value="5887">454 - Which of the following statements about bank reconciliations are correct?

1. An overdraft is a debit balance in a bank statement.

2. An eror by the bank should be recorded by means of an entry in the cash book.

3. When preparing a bank reconciliation statement, unpresented cheques should be deducted from the balance of cash as shown in the bank statement.

4. If a cheque from a customer is dishonoured, a debit entry to record the event should be entered in the cash book.</option><option value="5888">455 - A payables ledger control account showed a credit balance of $428,230. The payables ledger balances totalled $435,630.

Which of the following possible errors could account in full for the difference?</option><option value="5889">456 - The following information relates to Marina&#039;s hairdressing business in the year ended August 2011.

	                                          $
Expenses	                                        7,100
Opening inventory                    	1,500
Closing inventory	                       900
Purchases	                                      12,950
Gross profit	                  12,125
Inventory drawings of shampoo	      75

Which is the sales figure for the business?</option><option value="5890">457 - An asset is:</option><option value="5891">458 - Dean had assets of $19,000 at 30 April 2011. During the year to 30 April 2011, he introduced $9,800 additional capital into the business. Profits were $8,000, of which he withdrew $4,200.

What was the balance of Dean&#039;s capital account on 1 May 2010?</option><option value="5892">459 - The capital of a business will change as a result of:</option><option value="5893">460 - A draft statement of financial position has been prepared for Jack Gates, a sole trader. It is now discovered that a loan due for repayment by Jack Gates fourteen months after the reporting date has been included in trade payables.

The necessary adjustment will:</option><option value="5894">461 - The profit of a business may be calculated by using which of the following formulae?</option><option value="5895">462 - Which accounting concept requires that amounts of goods teken from inventory by the proprieter of a business are treated as drawings?</option><option value="5896">463 - The following information is available about Dave&#039;s business at 30 September2011:
	                                                                                                                               $
Motor van	                                                                                                                           14,000
Loan (repayable in 4 equal installments starting 1 January 2012) 	                         100,000
Receivables	                                                                                                        23,800
Bank balance (a debit on the bank statement)                                                                     3,250
Provisions for depreciation	                                                                                       7,000
Payables                                              	                                                                  31,050
Inventory	                                                                                                                            12,560
Petty cash	                                                                                                                                 150
Rent due	                                                                                                                              1,200
Allowance for receivables	                                                                                        1,500

What are the current figures for current liabilities and current assets?
	
	
</option><option value="5897">464 - The following transactions relate to Edward&#039;s buisness:

		                                                                                $
1 July	Purchase of goods for resale on credit	                      300
2 July	Edward injects long term capital into the business	1,400
3 July	Payment of rent made	                                                             750
5 July	Edward withdraws cash from the business                             400
7 July	Sales made on credit	                                                          1,200

(goods originally cosst $600)

At the start of the week the assets of the business were $17,500 and liabilities amounted to $11,200.

At the end of the wkke, what is Edward&#039;s capital?

		
</option><option value="5898">465 - Claire has $100,000 50c shares and 400,000 8% irredeemable preference shares in issue. A dividend of 3c per ordinary share and half of the preference dividend were paid during the year. 

Which of the following statements is true </option><option value="5899">466 - At 1 October 2010, Omar&#039;s capital was structured as follows:

Ordinary share of 25c 	       100,000
Share premium	         30,000

On 10 January 2011, in order to raise finance for expansion, there was a 1 for 4 rights issue at $1.15. The issue was fully taken up. This was followed by a 1 for 10 bonus issue on 1 June 2010.

What is the balance on the share premium account of these transactions?</option><option value="5900">467 - Where in a company&#039;s financial statements complying with international accounting standards, should you find dividends paid?</option><option value="5901">468 - Where in the financial statements should tax on profit for the current period, and unrealised surplus on revaluation of properties, be disclosed?

</option><option value="5902">469 - The following information is available about a company&#039;s dividends:

Sept 2010	                 Final dividend for the year ended 30 June 2009 paid         $100,000
                                    (declared August 2009)
	
March 2011                Interim dividend for the year ended 30 June 2011 paid	$40,000

Sept 2011	                 Final dividend for the year ended 30 June 2011 paid        $120,000
                                    (declared August 2011)	

What figures, if any, should be disclosed in the company&#039;s statement of comprehensive income for the year ended 30 June 2011 and its statement of financial position at that date?</option><option value="5903">470 - Which of the following statements are correct?

1. A rights issue might increase the share premium account whereas a bonus issue is likely to reduce it.

2. A company might make a rights issue if it wished to raise more equity capital.

3. A bonus issue will result in the market value of each share increasing.

4. A rights issue will always increase the number of shareholders in a company whereas a bonus issue will not.

</option><option value="5904">471 - At the end of the year 31 December 2011, Darligton, a limited liability company shows an overprovision of $3,400 on its tax liability account, before accounting for that years tax charge.

It estimates tax on profits for the year to be $67,900.

What amounts should be shown in the financial statements for the year ended 31 December 2011 in respect of tax?</option><option value="5905">472 - Classify the following assets and liabilities as current or non-current in Maryland a limited liability company&#039;s accounts.

1. A company has bought a small number of shares in another company which it intends to trade.

2. A sale has been made to a customer on credit. They have agreed to terms stating that payment is ude in 1 months time.

3. A bank overdraft facility of $30,000 is available under an agreement with the bank which extends 2 years.

4. A bank loan has been taken out with a repayment  5 years hence.</option><option value="5906">473 - Extracts from the accounting records of Baltimore, a company, relating to the year ended 31 December 2011 are as follows:

Revaluation surplus	                                                        $230,000
Ordinary interim dividend paid	                                       $12,000
Profit before tax	                                                        $178,000
Estimated tax liability for the year	                                       $45,000
8% $1 Preference shares	                                     $100,000
Under-provision for tax in previous year	                      $5,600
Proceeds of  issue of 2,000 $1 ordinary shares	   $5,000
Final ordinary dividend proposed	                                       $30,000

What is the total change reported in the statement of changes in equity for the year?</option><option value="5907">474 - Which of the following statements are true of preference shares?</option><option value="5908">475 - The nominal value paid by the shareholder plus further amounts that they have agreed to pay in the future best describes:</option><option value="5909">476 - A company issues 100,000 3% $1 redeemable preference shares during the year ended 30 September 2011 at 98c per share. What is the correct entry to account for this transaction?

Please look at this one: </option><option value="5910">477 - The nominal value paid by the shareholder plus further amounts that they have agreed to pay in the future best describes:</option><option value="5911">478 - Which of the following are advantages of a bonus issue?

1. It makes the shares in the company more marketable.

2. It is the cheapest way for a company to raise finance through the issuing of shares.

3. Issued share capitla is brought more into line with assets employed in the company.

4. The total  reserves of the business will increase.</option><option value="5912">479 - Blackridge prepares its accounts to a 30 September year end. It accounts for the year ended 30 September 2011 are approved on 12 January 2012 and issued on 20 February 2012.

Which of the following is an adjustment event after the reporting period?

1. A credit customer with an outstanding balance at the year end was declared bankrupt on 20 January 2012.

2. A flood destroys inventory which cost $1,700 on 3 December 2011.

3. An ordinary dividend of 4c per share was declared on 1 December 2011.

4. Inventory valued at a cost of $800 in the year end accounts was sold for $650 on 11 January 2011.</option><option value="5913">480 - Blackridge prepares its accounts to a 30 September year end. It accounts for the year ended 30 September 2011 are approved on 12 January 2012 and issued on 20 February 2012.

Which of the following is an adjustment event after the reporting period?

1. A credit customer with an outstanding balance at the year end was declared bankrupt on 20 January 2012.

2. A flood destroys inventory which cost $1,700 on 3 December 2011.

3. An ordinary dividend of 4c per share was declared on 1 December 2011.

4. Inventory valued at a cost of $800 in the year end accounts was sold for $650 on 11 January 2011.</option><option value="5914">481 - How should the purchase of a right to manufacture a patented product for the next ten years be accounted for?</option><option value="5915">482 - An intangible asset is best described as:</option><option value="5916">483 - Which of the following statements about the requirements of IAS 37 Provisions, Contingent liabilities and Contingent Assets are correct?

1. No disclosure of a contingent liability is required if the possibility of a transfer of economic benefits arising is remote.

2. Contingent assets must not be recognised in financial statements, unless an inflow of economic benefits is virtually certain to arise.

3. A contingent asset should be disclosed by note if an inflow of economic benefit is probable.

4. The recognition of a contingent asset must be recorded in the financial statements.</option><option value="5917">484 - Which of the following statements are correct according to IAS 10 Events After the reporting Period?

1. Details of all adjusting events must be disclosed by note to the financial statements.

2. If the market value of the investments falls materially after the reporting date, the details must be disclosed by note.

3. Events after the reporting date are those that occur between the statement of financial position date and the date when the financial statements are approved.

4. A material loss arising from the sale, after the reporting date of inventory valued at cost at the statement of finacial position date must be reflected in the financial statements. </option><option value="5918">485 - Globalcom is engaged in in the following research and development projects:

1. It is develping material for use in kitchens which is self cleaning and germ resistant. A competitor is currently developing a similar material and for this reason Globalcom is unsure whether their project will be completed.

2. It is applying a new technology to the production of heat resistant fabric. The project is intended to last for a further 18 months after which the fabric will be used in the production of uniforms for tyhe ememgency service.

3. It is considering whether a particular substance canbe used as an appetite suppressant. If this is the case, it is expected to be sold worldwide in chemists and pharmacies. 

The cost associated with which of these projects can be capitalised?</option><option value="5919">486 - RAX, a limited liability company, is engaged in a number of research and development projects:

1. A project to develop a new process which will save time in the production of widgets. This project was started 1 January 2011 and met the capitalisation criteria on 31 August 2011.

2. A project to investigate the properties of a chemical compound.

3. A development project which was completed on 30 June 2011. Related costs in the statement of financial position at the start of the year were $290,000. Production and sales of the new product commenced on 1 September and are expected to last 36 months. 

Costs for the year ended 31 December 2011 are as follows:

	                                           $
Project 1 cost to 31 August	78,870
Project costs from 31 August	27,800
Project 2 	                                      34,000
Project 3                                          19,800

What amount is expensed to the statement of comprehensive income in respect of these projects in the year ended 31 December 2011?

	                       	
</option><option value="5920">487 - RAX, a limited liability company, is engaged in a number of research and development projects:

1. A project to develop a new process which will save time in the production of widgets. This project was started 1 January 2011 and met the capitalisation criteria on 31 August 2011.

2. A project to investigate the properties of a chemical compound.

3. A development project which was completed on 30 June 2011. Related costs in the statement of financial position at the start of the year were $290,000. Production and sales of the new product commenced on 1 September and are expected to last 36 months. 

Costs for the year ended 31 December 2011 are as follows:

	                                           $
Project 1 cost to 31 August	78,870
Project costs from 31 August	27,800
Project 2 	                                      34,000
Project 3                                          19,800

What amount is expensed to the statement of comprehensive income in respect of these projects in the year ended 31 December 2011?

	                       	
</option><option value="5921">488 - Details of two of Corgy&#039;s transactions in the year ended 31 August 2011 are as follows:

1. It has sold a food processing mixer to a customer, Jones. The mixer has been delivered and Corgy will undertake a specialit installation within the nexty month.

2. It has sold a number a number of food liquidisers to another customer, Davis, on credit. These have been deliverd but Davis has not yet paid.

For which of the following transactions should revenue be recognised?

</option><option value="5922">489 - Details of two of Corgy&#039;s transactions in the year ended 31 August 2011 are as follows:

1. It has sold a food processing mixer to a customer, Jones. The mixer has been delivered and Corgy will undertake a specialit installation within the nexty month.

2. It has sold a number a number of food liquidisers to another customer, Davis, on credit. These have been deliverd but Davis has not yet paid.

For which of the following transactions should revenue be recognised?

</option><option value="5923">490 - Which of the following is not a condition that must met in order to record revenue from the rendering of services?
</option></select>
						  									  			
						  			<input class="btn btn-default" type="submit" value="Choose">
						  		
						  		</form>

						 </div>
					</div> 
					
					</div>
					

					
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">Questions</div>
							<div class="panel-body">
						  		<form method="POST" action="/pems/qandalive/1/showonlinequestions/5434/showonlinequestion" accept-charset="UTF-8"><input name="_token" type="hidden" value="XzJg3zha6BPgUkMYkd1XqHNXcAfeB3axbWRB0BBn">
						  			
						  			<div class="col-lg-6">
						  			<div class="form-group">
						  			<label for="question">Question</label>
						  			<textarea class="form-control" style="height:100px;" name="question" cols="50" rows="10" id="question">What is Double Entry? </textarea>
						  			</div>
						  			<div class="form-group">
						  			<label for="correct">Correct</label>
						  			<textarea class="form-control" style="height:90px;" name="correct" cols="50" rows="10" id="correct">A book-keeping  system in which any commercial transaction is entered as a debit in one account and as a credit in another.</textarea>
						  			</div>
							  			<div class="form-group">
							  				<label for="pageno">Page NO</label>
							  				<input name="pageno" type="number" value="0" id="pageno">
							  			</div>
							  			<div class="form-group">
							  				Is Online: 
							  				<br/>

							  				<input type="radio" id="isonline" name="isonline" value="1" checked>Online
							  				<br/>
							  				<input type="radio" id="isonline" name="isonline" value="0">Offline
							  				<br/>
							  			</div>
							  			<input class="btn btn-success" type="submit" value="Update">
							  			<a href="/pems/1/5434/deletequestion" class='btn btn-danger'>Delete</a>
						  			</div>
						  			<div class="col-lg-6">
						  			<div class="form-group">
						  			<label for="ans1">Answer 1</label>
						  			<textarea class="form-control" style="height:90px;" name="ans1" cols="50" rows="10" id="ans1">Another name for a Nominal Journal Entry.</textarea>
						  			</div>

						  			<div class="form-group">
						  			<label for="ans2">Answer 2</label>	
						  			<textarea class="form-control" style="height:90px;" name="ans2" cols="50" rows="10" id="ans2">An entry which occurs twice in the same account.</textarea>
						  			</div>

						  			<div class="form-group">
						  			<label for="ans3">Answer 3</label>	
						  			<textarea class="form-control" style="height:90px;" name="ans3" cols="50" rows="10" id="ans3">A duplicated bank charge.</textarea>
						  			</div>

						  			<div class="form-group">
						  			<label for="ans4">Answer 4</label>	
						  			<textarea class="form-control" style="height:90px;" name="ans4" cols="50" rows="10" id="ans4">A computer system.</textarea>
						  			</div>
						  			<div>
						  			
						  			</div>
						  		
						  		</form>

						 </div>
					</div> 
					
					</div>
								

			</div>
 			
	</div>
</div>
<script src="/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea',  menubar: false, forced_root_block : "" });</script>
  
</div>
                             
  @endsection