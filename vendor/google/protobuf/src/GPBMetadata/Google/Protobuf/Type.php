<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/protobuf/type.proto

namespace GPBMetadata\Google\Protobuf;

class Type
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Protobuf\SourceContext::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
google/protobuf/type.protogoogle.protobuf$google/protobuf/source_context.proto"�
Type
name (	&
fields (2.google.protobuf.Field
oneofs (	(
options (2.google.protobuf.Option6
source_context (2.google.protobuf.SourceContext\'
syntax (2.google.protobuf.Syntax"�
Field)
kind (2.google.protobuf.Field.Kind7
cardinality (2".google.protobuf.Field.Cardinality
number (
name (	
type_url (	
oneof_index (
packed ((
options	 (2.google.protobuf.Option
	json_name
 (	
default_value (	"�
Kind
TYPE_UNKNOWN 
TYPE_DOUBLE

TYPE_FLOAT

TYPE_INT64
TYPE_UINT64

TYPE_INT32
TYPE_FIXED64
TYPE_FIXED32
	TYPE_BOOL
TYPE_STRING	

TYPE_GROUP

TYPE_MESSAGE

TYPE_BYTES
TYPE_UINT32
	TYPE_ENUM
TYPE_SFIXED32
TYPE_SFIXED64
TYPE_SINT32
TYPE_SINT64"t
Cardinality
CARDINALITY_UNKNOWN 
CARDINALITY_OPTIONAL
CARDINALITY_REQUIRED
CARDINALITY_REPEATED"�
Enum
name (	-
	enumvalue (2.google.protobuf.EnumValue(
options (2.google.protobuf.Option6
source_context (2.google.protobuf.SourceContext\'
syntax (2.google.protobuf.Syntax"S
	EnumValue
name (	
number ((
options (2.google.protobuf.Option";
Option
name (	#
value (2.google.protobuf.Any*.
Syntax
SYNTAX_PROTO2 
SYNTAX_PROTO3B{
com.google.protobufB	TypeProtoPZ-google.golang.org/protobuf/types/known/typepb��GPB�Google.Protobuf.WellKnownTypesbproto3'
        , true);

        static::$is_initialized = true;
    }
}

