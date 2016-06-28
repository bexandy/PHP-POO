<?php
header("Content-Type: application/rss+xml");
echo "<?xml version='1.0' encoding='iso-8859-1' ?>";
?>
<rss version="2.0" xmlns="http://www.w3.org/2005/Atom">
  <channel>
  <title><![CDATA[PHP-POO - Lo más nuevo]]></title>
    <link><![CDATA[http://php-poo.local/sindicacion]]></link>
    <description><![PHP-POO - Lo más nuevo]]></description>
    <language>es-ES</language>
    <copyright><![CDATA[Bexandy Rodríguez]]></copyright>
    <atom:link href="http://php-poo.local/sindicacion/rss.php" rel="self" type="application/rss+xml" />
    <ttl>15</ttl>

    <image>
      <url>http://php-poo.local/sindicacion/images/bexandy.jpg</url>
      <title>PHP-POO - Lo más nuevo</title>
      <link>http://php-poo.local/sindicacion</link>
    </image>

    <item>
      <title>
        <![CDATA[titulo]]>
      </title>
      <link>
      <![CDATA[url]]>
    </link>
    <description>
      <![CDATA[div justificado descripcion]]>
    </description>
    <guid isPermaLink="true">
      <![CDATA[url]]>
    </guid>
    <author>
      <![CDATA[correo (nombre)]]>
    </author>
    <pubDate>
      <![CDATA[fecha]]>
    </pubDate>
  </item>
</channel>
</rss>
