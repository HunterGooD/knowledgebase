<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
    xmlns="http://www.w3.org/1999/xhtml"
    xmlns:xhtml="http://www.w3.org/1999/xhtml"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    exclude-result-prefixes="xhtml xsl"
    version="1.0">

    <xsl:output
        media-type="application/xhtml+xml"
        method="xml"
        encoding="UTF-8"
        indent="yes"
        omit-xml-declaration="no"
        doctype-public="-//W3C//DTD XHTML 1.1//EN"
        doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
    <!--    <xsl:variable name="newline">
        <xsl:text>
        </xsl:text>
    </xsl:variable>-->
    <xsl:strip-space elements="*" />

    <!-- the identity template -->
    <xsl:template match="@*|node()">
        <xsl:copy>
            <xsl:apply-templates select="@*|node()"/>
        </xsl:copy>
    </xsl:template>
    <xsl:template match="processing-instruction('xml-stylesheet')">
    </xsl:template>
    <xsl:template match="xhtml:head">
        <xsl:copy>
            <xsl:apply-templates select="@*|node()"/>
            <link rel="stylesheet" type="text/css" href="/web/oooxhtml/oooxhtml.css"/>
            <link rel="stylesheet" type="text/css" href="/web/css/main.css"/>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <script type="text/javascript" src="/privapi/web/scripts/privilegedAPI.js">
                <xsl:text><![CDATA[]]></xsl:text>
            </script>
        </xsl:copy>
    </xsl:template>

    <xsl:template match="xhtml:body">
        <xsl:copy>
            <div class="contents">
                <a href="index.php">
                    <h1 class="table_font"> &lt; - К файлам</h1>
                </a>
            </div>
            <xsl:apply-templates select="@*|node()"/>
            <script type="text/javascript" src="/web/oooxhtml/oooxhtml.js">
                <xsl:text><![CDATA[]]></xsl:text>
            </script>
        </xsl:copy>
    </xsl:template>

</xsl:stylesheet>
