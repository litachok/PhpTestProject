<?xml version="1.0"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
         <html>
            <head>
                <title>StorageHouse</title>
            </head>
            <body>
                <h1>StorageHouse</h1>
                <table border='1'>
                    <tr>
                        <th>Name</th>
                        <th>Weight</th>
                        <th>Category</th>
                        <th>Location</th>
                    </tr>
                 <xsl:for-each  select="storagehouse/item">
                    <tr>
                        <td><xsl:value-of select="name"/></td>
                        <td><xsl:value-of select="weight"/></td>
                        <td><xsl:value-of select="category"/></td>
                        <td><xsl:value-of select="location"/></td>
                    </tr>
                 </xsl:for-each>    
                 </table>
                <input type="button" name="Add" id="add" onclick="jsdfgkl()" value="add" />
            </body>
        </html>
     </xsl:template> 
</xsl:stylesheet>
