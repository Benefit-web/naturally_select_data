<div id="undercolumn">
  <h2 class="title"><!--{$tpl_title|h}--></h2>
  <div id="undercolumn_shopping">
  <form method="post" name="nextform" action="<!--{$edyLinkPointUrl}-->" Accept-charset="shift_jis">
    <input type="hidden" name="clientip"     value="<!--{$clientip|escape}-->" />
    <input type="hidden" name="act"          value="<!--{$act|escape}-->"      />
    <input type="hidden" name="money"        value="<!--{$money|escape}-->"    />
    <input type="hidden" name="username"     value="<!--{$username|escape}-->" />
    <input type="hidden" name="telno"        value="<!--{$telno|escape}-->"    />
    <input type="hidden" name="email"        value="<!--{$email|escape}-->"    />
    <input type="hidden" name="sendid"       value="<!--{$sendid|escape}-->"   />
    <input type="hidden" name="sendpoint"    value="<!--{$sendpoint|escape}-->"/>
    <input type="hidden" name="success_url"      value="<!--{$success_url|escape}-->"  />
    <input type="hidden" name="success_str"      value="<!--{$success_str|escape}-->"  />
    <input type="hidden" name="failure_url"      value="<!--{$failure_url|escape}-->"  />
    <input type="hidden" name="failure_str"      value="<!--{$failure_str|escape}-->"  />
    <table>
      <tr>
        <td class="alignL">
          <p>「次へ」をクリックすると楽天Edy決済申し込みサイトに遷移します。ドメインが変わりますが、そのままお手続きを進めてください。</p>
          <span class="attention">
          ※決済用サイトに遷移しますと、ご注文完了となり、内容変更ができません。予めご了承ください。<br />
          ※画面が切り替るまで少々時間がかかる場合がございますが、そのままお待ちください。<br />
          ※画面が変わらない場合には、「次へ」をクリックしてください。
          </span>
        </td>
      </tr>
    </table>
    <div class="btn_area">
      <p class="submit"><input type="submit" value="次へ"></p>
    </div>
  </form>
  </div>
</div>
